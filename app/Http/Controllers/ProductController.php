<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	if (request('query')) {
    		$products = Product::where('name', 'like', '%'.request('query').'%')->paginate(10)
    		->appends(request()->except('page'));
    	} else {
    		$products = Product::orderBy('created_at', 'desc')->paginate(10);
    	}
    	
    	return view('admin.product.index', compact('products'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'product_name' => 'required|string|unique:products,name',
    		'product_desc' => 'required',
    		'product_weight' => 'required|numeric',
    		'product_price' => 'required|numeric',
    		'category_id' => 'required|numeric',
    		'photo' => 'required|image|mimes:jpeg,png|max:200'
    	]);

    	//save database
		$product = new Product();
		$product->name = $request->product_name;
		$product->category_id = $request->category_id;
		$product->description = $request->product_desc;
		$product->weight = $request->product_weight;
		$product->price = $request->product_price;
		$product->save();

		$slug = str_slug($product->name);

		//upload image
    	$photo = $this->upload_photo($request, $slug);

    	//update product
    	$product->slug = $slug;
    	$product->photo = $photo;
    	$product->save();

    	return redirect()->route('admin.product.index')
    	->with('status', 'Berhasil menambah produk.');
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->firstOrFail();
    	$categories = Category::all();
    	return view('admin.product.show', compact('product', 'categories'));	
    }

    public function update(Request $request, Product $product)
    {
    	$request->validate([
			'product_name' => 'required|string|unique:products,name,'.$product->id,
    		'product_desc' => 'required',
    		'product_weight' => 'required|numeric',
    		'product_price' => 'required|numeric',
    		'category_id' => 'required|numeric',
    		'photo' => 'image|mimes:jpeg,png|max:200'
		]);

		if ($request->hasFile('photo')) {
    		if (file_exists(public_path('images/product/'.$product->photo))) {
    			File::delete(public_path('images/product/'.$product->photo));
    		}

    		//upload image
    		$photo = $this->upload_photo($request, $product->slug);
    		$product->photo = $photo;
    		$product->save();
    	}

		//update daatabase
		$product->name = $request->product_name;
		$product->category_id = $request->category_id;
		$product->description = $request->product_desc;
		$product->weight = $request->product_weight;
		$product->price = $request->product_price;
		$product->slug = str_slug($product->name);
		$product->save();

    	return redirect()->route('admin.product.index')
    	->with('status', 'Berhasil Memperbaharui produk');
    }

    public function destroy(Product $product)
    {
    	$product->delete();
    	return redirect()->route('admin.product.index')
    	->with('status', 'Berhasil hapus produk');
    }

    private function upload_photo($request, $slug)
    {
         // upload image
        $filename = $slug . '.' . $request->photo->getClientOriginalExtension();
        $path = public_path('images/product/' . $filename);
        $image = Image::make($request->photo->getRealpath());
        $height = $image->height();
        $width = $image->width();
        if ($height < $width) {
            $image->crop($height, $height)->save($path); 
        } elseif ($height > $width) {
            $image->crop($width, $width)->save($path); 
        } else {
            $image->save($path);
        }
        return $filename;
    }
}
