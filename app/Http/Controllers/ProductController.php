<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan data produk ke database
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category' => $request->category,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function show($id){
        $product = Product::with(['comments.user'])->findOrFail($id); // ambil produk + komentar + user pemberi komentar
        return view('admin.product.show', compact('product'));
    }
}
