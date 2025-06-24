<?php

namespace App\Http\Controllers;

use App\Models\Product;

class UserHomeController extends Controller
{
    public function index()
    {
        // Lấy 6 sản phẩm bất kỳ để làm "sản phẩm nổi bật"
        $products = Product::inRandomOrder()->take(6)->get();
        return view('User.HomeUser', compact('products'));
    }
    public function show(Product $product)
    {
        return view('user.ProductDetail', compact('product'));
    }
}
