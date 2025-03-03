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

        Products::create([
            "name" => $request->input('name'),
            "price" => $request->input('price'),
            "stok" => $request->input('stok'),
            "description" => $request->input('description'),
            "sku" => $request->input('sku'),
            "category_id" => $request->input('category_id'),
        ]);
        return redirect('/products');
    }
}
