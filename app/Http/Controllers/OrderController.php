<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\OrderTrait;
use App\Order;
use App\OrderDetail;
use App\Stock;
use Auth;

class OrderController extends Controller
{
	use OrderTrait;

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->isAdmin() || Auth::user()->isOperator()) {
            if (request('query')) {
                $orders = Order::where('code', 'like', '%'.request('query').'%')
                ->paginate(10)->appends(request()->except('page'));
            } else {
                $orders = Order::orderBy('order_status_id', 'asc')->paginate(10);
            }
            
            return view('admin.order.index', compact('orders'));
        }

    	$orders = Auth::user()->orders()->orderBy('created_at', 'desc')->paginate(10);
    	return view('member.order.index', compact('orders'));
    }

    public function store(Request $request)
    {
    	$checkout = $this->getCheckout();
    	$carts = $this->getCarts();

    	//save order
    	$order = new Order();
    	$order->code = $this->generateCode('ord', 'orders');
    	$order->full_name = $checkout->first_name . ' ' . $checkout->last_name;
    	$order->address = $checkout->address;
    	$order->city_id = $checkout->city_id;
    	$order->province_id = $checkout->province_id;
    	$order->postal_code = $checkout->postal_code;
    	$order->phone = $checkout->phone;
    	$order->delivery_service = $checkout->delivery_service;
    	$order->shipping_cost = $checkout->shipping_cost;
    	$order->subtotal = $checkout->subtotal;
    	$order->user_id = Auth::id();
    	$order->save();

    	//save order detail;
    	foreach ($carts as $cart) {
    		OrderDetail::create([
    			'order_id' => $order->id,
    			'product_id' => $cart->product_id,
    			'product_price' => $cart->product->price,
    			'qty' => $cart->qty
    		]);
    	}

    	//delete carts & checkout
    	$this->destroyCarts();
    	$this->destroyCheckout();

    	return redirect('member/order/'.$order->code)
    	->with('status', 'Pesanan baru anda telah dibuat');
    }

    public function show(Order $order)
    {
        if (Auth::user()->isAdmin() || Auth::user()->isOperator()) {
            return view('admin.order.show', compact('order'));
        }
    	return view('member.order.show', compact('order'));
    }

    public function setDelivered(Order $order)
    {
        $order->order_status_id = 4;
        $order->save();

        return back()->with('status', 'Anda sudah konfirmasi bahwa pesanan anda sudah sampai.');
    }

    public function process(Order $order)
    {
        $order->order_status_id = 2;
        $order->save();

        //mengurangi stock
        foreach ($order->details as $detail) {
            $stock = Stock::where('product_id', $detail->product_id)->firstOrFail();
            $stock->total -= $detail->qty;
            $stock->save();
        }

        return back()->with('status', 'Pembayaran selesai');
    }

    public function send(Request $request, Order $order)
    {
        $request->validate([
            'resi_number' => 'required'
        ]);

        $order->resi_number = $request->resi_number;
        $order->order_status_id = 3;
        $order->save();
        return back()->with('status', 'Pesanan sudah dikirim');
    }
}
