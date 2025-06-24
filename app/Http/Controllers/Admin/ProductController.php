<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    $products = Product::paginate(15);
    return view('Admin.AdminProduct', [
        'mode' => 'index',
        'products' => $products
        ]);
    }

// Xem chi tiết sản phẩm
    public function show(Product $product)
    {
    return view('Admin.AdminProduct', [
        'mode' => 'show',
        'product' => $product
        ]);
    }

// Sửa sản phẩm
    public function edit(Product $product)
    {
    return view('Admin.AdminProduct', [
        'mode' => 'edit',
        'product' => $product
        ]);
    }

// Cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
         $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;

        }

    $product->update($data);
    return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

// Xóa sản phẩm
    public function destroy(Product $product)
    {
    if ($product->image && file_exists(public_path('images/' . $product->image))) {
        unlink(public_path('images/' . $product->image));
    }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }

// Thêm sản phẩm mới (nếu có)
    public function create()
    {
    return view('Admin.AdminProduct', [
        'mode' => 'create'
        ]);
    }

// Lưu sản phẩm mới (nếu có)
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['image'] = $filename;
    }
    Product::create($data);
    return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }
}
