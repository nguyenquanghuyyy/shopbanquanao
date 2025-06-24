<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Log;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('User.OrderUser', [
            'mode' => 'index',
            'orders' => $orders
        ]);
    }

    public function create()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $items = $cart ? $cart->cartItems()->with('product')->get() : collect();
        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }
        return view('User.OrderUser', [
            'mode' => 'create',
            
            'cart' => $cart,
            'items' => $items
        ]);
    }

    /*public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'order_date' => now(),
            'total' => $cart->cartItems()->with('product')->get()->sum(function ($item) {
                return $item->quantity * $item->product->price;
            }), 
        ]);

        foreach ($cart->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                
            ]);
        }
        

        $cart->cartItems()->delete();
        // Quay về danh sách đơn hàng (mode index)
        return redirect()->route('user.orders.index')->with('success', 'Đặt hàng thành công!');
    }*/
    public function store(Request $request)
    {
        // Validate user đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng!');
        }

        // Load cart với cartItems và products - sử dụng eager loading
        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product')->first();
    
        // Kiểm tra cart tồn tại và có items
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Không tìm thấy giỏ hàng!');
        }

        if ($cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        // Validate tất cả sản phẩm còn tồn tại và có giá hợp lệ
        $hasError = false;
        $errorMessage = '';
    
        foreach ($cart->cartItems as $item) {
            if (!$item->product) {
                $hasError = true;
                $errorMessage = 'Có sản phẩm trong giỏ hàng không còn tồn tại!';
                break;
            }   
        
            if ($item->product->price <= 0) {
                $hasError = true;
                $errorMessage = 'Sản phẩm "' . $item->product->name . '" có giá không hợp lệ!';
                break;
            }
        
            if ($item->quantity <= 0) {
                $hasError = true;
                $errorMessage = 'Số lượng sản phẩm không hợp lệ!';
                break;
            }
        }

        if ($hasError) {
            return redirect()->route('cart.index')->with('error', $errorMessage);
        }

        // Tính tổng tiền
        $total = 0;
        $orderItems = [];
    
        foreach ($cart->cartItems as $item) {
            $itemTotal = $item->quantity * $item->product->price;
            $total += $itemTotal;
        
            // Chuẩn bị dữ liệu cho order items
            $orderItems[] = [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Kiểm tra total > 0
        if ($total <= 0) {
            return redirect()->route('cart.index')->with('error', 'Tổng tiền đơn hàng không hợp lệ!');
        }

        // Sử dụng database transaction để đảm bảo tính nhất quán
        DB::beginTransaction();
    
        try {
            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'order_date' => now(),
                'total' => $total,
            ]);

            // Thêm order_id vào từng order item
            foreach ($orderItems as &$orderItem) {
                $orderItem['order_id'] = $order->id;
            }

            // Bulk insert order items (hiệu quả hơn)
            OrderItem::insert($orderItems);

            // Xóa tất cả cart items
            $cart->cartItems()->delete();
        
            // Commit transaction
            DB::commit();
        
            // Redirect với thông báo thành công
            return redirect()->route('user.orders.index')
                        ->with('success', 'Đặt hàng thành công! Mã đơn hàng: #' . $order->id . ' - Tổng tiền: ' . number_format($total, 0, ',', '.') . ' VNĐ');
                       
        } catch (\Exception $e) {
            // Rollback nếu có lỗi
            DB::rollback();
        
            // Log lỗi để debug
            \Log::error('Order creation failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'cart_id' => $cart->id,
                'total' => $total
            ]);
        
            return redirect()->back()
                       ->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!')
                       ->withInput();
        }
    }   
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403, 'Bạn không có quyền xem đơn này.');
        $order->load('orderItems.product');
        return view('User.OrderUser', [
            'mode' => 'show',
            'order' => $order
        ]);
    }

    public function destroy(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền xóa đơn hàng này.');
        }
        $order->delete();
        return redirect()->route('user.orders.index')->with('success', 'Xóa đơn hàng thành công!');
    }
    
    // Nếu muốn có trang xác nhận xóa riêng, thêm hàm này:
    public function confirmDelete(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);
        return view('User.OrderUser', [
            'mode' => 'destroy',
            'order' => $order
        ]);
    }
}
