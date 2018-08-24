<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionData;
use App\Product;
use App\Cart;
use Session;


class CartController extends Controller
{
	public function index()
	{
		$carts = $this->getCarts();
		$subtotal = $this->subtotalFormatted($carts);
		return view('cart.index', compact('carts', 'subtotal'));
	}

    public function store(Request $request)
    {
    	if (Cart::where('session_id', Session::getId())->where('product_id', $request->product_id)->exists()) {
    		$cart = Cart::where('session_id', Session::getId())->where('product_id', $request->product_id)->first();
    		$cart->qty += 1;
    		$cart->save();
    	} else {
    		Cart::create([
    			'session_id' => Session::getId(),
    			'product_id' => $request->product_id,
    			'qty' => 1
    		]);
    	}

    	return redirect()->back()->with('status', 'Berhasil menambahkan produk ke keranjang.');
    }

    public function destroy(Cart $cart)
    {
    	$cart->delete();
    	return redirect('cart');
    }

    public function update(Request $request)
    {
    	if ($this->getCarts()->count() < 1) {
    		return back();
    	}
    	
    	foreach ($request->cart_id as $id) {
    		if ($request->qty[$id] == 0) {
    			Cart::find($id)->delete();
    		} else {
    			Cart::where('id', '=', $id)->update(['qty' => $request->qty[$id]]);
    		}
    	}
    	return redirect('cart');
    }

    private function subtotal($carts)
    {
    	$subtotal = 0;
		foreach ($carts as $cart) {
			$subtotal += $cart->total();
		}
		return $subtotal;
    }

    private function subtotalFormatted($carts)
    {
    	return 'Rp '.number_format($this->subtotal($carts), 0, '', '.');
    }

    private function getCarts()
    {
    	return Cart::where('session_id', Session::getId())->get();
    }
}
