<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
use Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$wishlists = Auth::user()->wishlists()->orderBy('created_at', 'desc')->paginate(9);
    	return view('member.wishlist.index', compact('wishlists'));
    }

    public function store(Request $request)
    {
    	$product = Product::findOrFail($request->product_id);

    	if (Auth::user()->wishlists()->where('product_id', $product->id)->exists()) {
    		return back()->with('info', 'Produk '.$product->name.' sudah terdaftar di wishlist anda.');
    	}

    	Wishlist::create([
    		'product_id' => $request->product_id,
    		'user_id' => Auth::id()
    	]);

    	return back()->with('info', 'Produk '.$product->name.' telah ditambahkan ke daftar wishlist anda.');
    }

    public function destroy(Wishlist $wishlist)
    {
    	$wishlist->delete();
    	return back()->with('status', 'Berhasil hapus produk dari wishlist anda');
    }
}
