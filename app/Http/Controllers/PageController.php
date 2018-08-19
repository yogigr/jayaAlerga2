<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class PageController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('created_at', 'desc')->take(6)->get();
    	return view('page.index', compact('products'));
    }

    public function shop()
    {
        if (request('query')) {
            $products = Product::where('name', 'like', '%'.request('query').'%')
            ->paginate(9)->appends(request()->except('page'));
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(9);
        }
        
        $categories = Category::all();
        return view('page.shop', compact('products', 'categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        if (request('query')) {
            $products = $category->products()->where('name', 'like', '%'.request('query').'%')
            ->paginate(1)->appends(request()->except('page'));
        } else {
            $products = $category->products()->orderBy('created_at', 'desc')->paginate(9);
        }
        
        $categories = Category::all();
        return view('page.category', compact('products', 'categories', 'category'));
    }

    public function detailProduct($slug)
    {
    	$product = Product::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $relatedProducts = $product->category->products()->where('id', '!=', $product->id)
        ->orderBy('created_at', 'desc')->take(3)->get();
    	return view('page.detail_product', compact('product', 'categories', 'relatedProducts'));
    }
}
