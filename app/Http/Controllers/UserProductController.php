<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->filled('name')) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('category_id')) {
            $products->where('category_id', $request->category_id);
        }
        if ($request->filled('price_min')) {
            $products->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $products->where('price', '<=', $request->price_max);
        }

        $products = $products->paginate(12);

        return view('user.ShopUser', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.ProductDetail', compact('product'));
    }
}
