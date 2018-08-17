<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$categories = Category::orderBy('created_at', 'desc')->paginate('10');
    	return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'category_name' => 'required|string|unique:categories,name',
    	]);

    	Category::create([
    		'name' => $request->category_name
    	]);

    	return redirect()->route('admin.category.index')->with('status', 'Berhasil menambah kategori');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('status', 'Berhasil Hapus Kategori.');
    }
}
