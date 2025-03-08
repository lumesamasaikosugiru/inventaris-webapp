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
        $products = Products::orderBy('id', 'desc')->paginate(10);
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
        ], [
            "name.required" => "Nama tidak boleh kosong!",
            "name.min" => "Minimal 3 karakter!",
            "price.required" => "Harga tidak boleh kosong!",
            "stok.required" => "Stok tidak boleh kosong!",
            "category_id.required" => "Kategori tidak boleh kosong!",
            "sku.required" => "Kode barang tidak boleh kosong!"
        ]);


        Products::create($validated);
        return redirect('/products')->with('success', 'Data ditambahkan!');
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
        ], [
            "name.required" => "Nama tidak boleh kosong!",
            "name.min" => "Minimal 3 karakter!",
            "price.required" => "Harga tidak boleh kosong!",
            "stok.required" => "Stok tidak boleh kosong!",
            "category_id.required" => "Kategori tidak boleh kosong!",
            "sku.required" => "Kode barang tidak boleh kosong!"
        ]);


        Products::where('id', $id)->update($validated);
        return redirect('/products')->with('success', 'Data diubah!');
    }

    public function delete($id)
    {
        $product = Products::where('id', $id);
        $product->delete();
        return redirect('/products')->with('success', 'Data terhapus!');
    }
}
