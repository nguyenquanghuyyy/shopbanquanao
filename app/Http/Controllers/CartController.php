<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $items = $cart->cartItems()->with('product')->get();
        
        return view('User.CartUser', compact('cart', 'items'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $item = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($item) {
            $item->quantity += $request->input('quantity', 1);
            $item->save();
        } else {
            $cart->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request, CartItem $item)
    {
        $item->update([
            'quantity' => $request->input('quantity', 1)
        ]);
        return redirect()->route('cart.index')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    public function remove(CartItem $item)
    {
        $item->delete();
        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}
