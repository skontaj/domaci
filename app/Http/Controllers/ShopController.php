<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        
        return view('shop', compact('products'));
    }
}
