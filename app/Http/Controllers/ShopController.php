<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = [
            [
            'name' => 'Apple iPhone 14',
            'description' => '6.1-inch display, A15 Bionic chip, Dual 12MP camera system.',
            'amount' => 8,
            'price' => 799.99,
            'image' => 'https://intercomp.com.mt/wp-content/uploads/2022/09/Apple-iPhone-14-Blue.jpg'
            ],
            [
            'name' => 'Samsung Galaxy S23',
            'description' => '6.1-inch Dynamic AMOLED, Snapdragon 8 Gen 2, Triple camera.',
            'amount' => 12,
            'price' => 749.99,
            'image' => 'https://ilenta.com/netcat_files/440/310/galaxy_s23_0.jpg'
            ],
            [
            'name' => 'Google Pixel 7',
            'description' => '6.3-inch display, Google Tensor G2, Dual rear camera.',
            'amount' => 15,
            'price' => 599.99,
            'image' => 'https://bandwidthblog.co.za/wp-content/uploads/2022/10/pixel-7.jpg'
            ]
        ];
        
        return view('shop', compact('products'));
    }
}
