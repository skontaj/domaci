<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }

    public function index()
    {
        $products = Product::orderBy('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.create')->with('success', 'Product added successfully!');
    }
}
