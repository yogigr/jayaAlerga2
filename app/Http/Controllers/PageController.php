<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('created_at', 'desc')->take(6)->get();
    	return view('page.index', compact('products'));
    }

    public function detailProduct($slug)
    {
    	$product = Product::where('slug', $slug)->firstOrFail();
    	return view('page.detail_product', compact('product'));
    }
}
