<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('Category')->get();
        return view('pages.products.index', [
            "products" => $products,
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stok" => "required",
            "category_id" => "required",
            "sku" => "required",
        ]);


        Products::create($validated);
        return redirect('/products');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product = Products::findOrFail($id);
        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stok" => "required",
            "category_id" => "required",
            "sku" => "required",
        ]);


        Products::where('id', $id)->update($validated);
        return redirect('/products');
    }

    public function delete($id)
    {
        $product = Products::where('id', $id);
        $product->delete();
        return redirect('/products');
    }
}
