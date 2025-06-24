<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    $orders = Order::paginate(15);
    return view('Admin.AdminOrder', [
        'mode' => 'index',
        'orders' => $orders
        ]);
    }

// Xem chi tiết đơn hàng
    public function show(Order $order)
    {
    $order->load('orderItems.product', 'user');
    return view('Admin.AdminOrder', [
        'mode' => 'show',
        'order' => $order
        ]);
        }

// Sửa đơn hàng
    public function edit(Order $order)
    {
    return view('Admin.AdminOrder', [
        'mode' => 'edit',
        'order' => $order
        ]);
    }

// Cập nhật đơn hàng
    public function update(Request $request, Order $order)
    {
    $request->validate([
        'status' => 'required'
        ]);
    $order->update($request->only('status'));
    return redirect()->route('admin.orders.index')->with('success', 'Cập nhật đơn hàng thành công!');
    }

// Xóa đơn hàng
    public function destroy(Order $order)
    {
    $order->delete();
    return redirect()->route('admin.orders.index')->with('success', 'Xóa đơn hàng thành công!');
    }
    }
