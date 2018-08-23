<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Shipping;
use App\City;
use App\Province;
use App\Checkout;
use App\Cart;
use Session;

class CheckoutController extends Controller
{
	use Shipping;

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function newCheckout()
    {
        if ($this->cartSubtotal() == 0) {
            return back();
        }
        
        $checkout = Checkout::updateOrCreate(
            ['session_id' => Session::getId()],
            ['subtotal' => $this->cartSubtotal()]
        );
        return redirect('checkout/address');
    }

    public function addressForm()
    {
    	$cities = City::all();
    	$provinces = Province::all();
        $checkout = Checkout::where('session_id', Session::getId())->first();
    	return view('checkout.address', compact('cities', 'provinces', 'checkout'));
    }

    public function address(Request $request)
    {
    	$request->validate([
    		'first_name' => 'required|string',
    		'last_name' => 'required|string',
    		'address' => 'required|string',
    		'city_id' => 'required|numeric',
    		'province_id' => 'required|numeric',
    		'postal_code' => 'required|numeric',
    		'phone' => 'required|numeric',
    	]);

    	$checkout = Checkout::updateOrCreate(
    		['session_id' => Session::getId()],
    		[
    			'first_name' => $request->first_name,
    			'last_name' => $request->last_name,
    			'address' => $request->address,
    			'city_id' => $request->city_id,
    			'province_id' => $request->province_id,
    			'postal_code' => $request->postal_code,
    			'phone' => $request->phone
    		]
    	);

    	return redirect('checkout/shipping');
    }

    public function shippingForm()
    {
    	$data = $this->shippingData();
    	if (is_object($data)) {
    		$status = $data->rajaongkir->status;
    		$results = $status->code == 200 ? $data->rajaongkir->results[0]->costs : '';
    	}
        $checkout = Checkout::where('session_id', Session::getId())->first(); 

    	return view('checkout.shipping', compact('data', 'status', 'results', 'checkout'));
    }

    public function shipping(Request $request)
    {
        $request->validate([
            'delivery' => 'required',
        ]);
        $shipping = explode(':', $request->delivery);
        Checkout::updateOrCreate(
            ['session_id' => Session::getId()],
            [
                'delivery_service' => $shipping[0],
                'shipping_cost' => $shipping[1]
            ]
        );
        return redirect('checkout/payment');
    }

    public function paymentForm()
    {
        $checkout = Checkout::where('session_id', Session::getId())->first();
        return view('checkout.payment', compact('checkout'));
    }

    public function payment(Request $request)
    {
        Checkout::updateOrCreate(
            ['session_id' => Session::getId()],
            [
                'payment_method' => $request->payment_method
            ]
        );

        return redirect('checkout/review');
    }

    public function review()
    {
        $checkout = Checkout::where('session_id', Session::getId())->first();
        $carts = Cart::where('session_id', Session::getId())->get();
        return view('checkout.review', compact('checkout', 'carts'));
    }

}
