PROJECT Website shop quần áo
 - Thông Tin Sinh Viên
 - Họ và tên: Nguyễn Quang Huy
 - Mã sinh viên: 23010731
 - Lớp: K17_CNTT-8
 - Môn học: Thiết kế Web nâng cao (COUR01.TH4)
 - Giới thiệu Project
 - đây là project về website bán quần áo mang đến trải nghiệm mua sắm hiện đại, tiện lợi và nhanh chóng.

Chức năng chính
- Chức năng của Admin:
   + Quản lý danh mục sản phẩm (thêm, sửa, xóa, tìm kiếm danh mục)
   + Quản lý sản phẩm (thêm, sửa, xóa, tìm kiếm, phân loại sản phẩm)
   + Quản lý tài khoản người dùng (xem, phân quyền, sửa, xóa)
   + Quản lý đơn hàng (xem, duyệt, hủy, cập nhật trạng thái)
- Chức năng của Người mua (User):
  + Duyệt và tìm kiếm sản phẩm
  + giỏ hàng
  + thanh toán đơn hàng
  + Cập nhật thông tin cá nhân

Công Nghệ Sử Dụng được sử dụng trong project
-	PHP (Laravel)	Framework backend, xử lý logic chính
-	MySQL (Aiven Cloud)	Hệ quản trị cơ sở dữ liệu
-	Blade Template	Template engine cho giao diện Laravel
-	HTML, CSS	Xây dựng giao diện người dùng và giao diện admin

- Cài Đặt
- Clone Repository
- git clone https://github.com/nguyenquanghuyyy/shopbanquanao.git

- Cài Đặt Dependencies PHP
- composer install
- Cấu Hình Environment
- cp .env.example .env
- php artisan key:generate
- Khởi Động Development Server
- php artisan serve
- Tài Khoản Đăng Nhập Mẫu
- 1. Tài khoản Admin

- Email:admin@example.com
- Mật khẩu:matkhaucuaban
- 2. Tài khoản User

- Email:huyccht123@gmail.com
- Mật khẩu:huy20112005

- Nếu không Bạn có thể tự đăng ký một tài khoản mới bằng chức năng Đăng ký trên trang chủ.
-  Sơ Đồ
  - sơ đồ cơ sở dữ liệu
- Sơ đồ cơ sở dữ liệu
 - vì đang trong giai đoạn hoàn thiện nốt project nên em sẽ bổ sung trong thời gian sớm nhất ạ
- 1. Các bảng chính
+ users: Lưu thông tin tài khoản người dùng (admin và user): tên, email, mật khẩu, v.v.
+ products: Lưu thông tin sản phẩm: tên, mô tả, giá, hình ảnh, thuộc danh mục nào.
+ carts: Đại diện cho giỏ hàng của user.
+ cart_items: sản phẩm nào thuộc giỏ hàng nào, sản phẩm nào, số lượng bao nhiêu.
+ orders: thông tin đơn hàng của user: id của user, sản phẩm nào, số lượng bao nhiêu, thời gian đặt hàng.
+ order_details: thông tin của từng sản phẩm trong đơn hàng (sản phẩm nào, số lượng, giá trị).
.
- 2. Mối quan hệ giữa các bảng
+ vì đang trong quá trình hoàn thiện nốt project nên em xin phép cô sẽ bổ sung thêm sau ạ
- Sơ đồ cấu trúc (Class Diagram)
- Sơ đồ cấu trúc
- vì đang trong quá trình hoàn thiện nốt project nên em xin phép cô sẽ bổ sung thêm sau ạ
  - Sơ đồ thuật toán
- vì đang trong quá trình hoàn thiện nốt project nên em xin phép cô sẽ bổ sung thêm sau ạ
- Kiến Trúc MVC
- Hệ thống tuân theo mô hình MVC (Model-View-Controller) của Laravel:

+ Models: Xử lý logic dữ liệu và tương tác cơ sở dữ liệu
+ Views: Blade templates để render giao diện người dùng
+ Controllers: Xử lý yêu cầu người dùng và phối hợp giữa models và views
+ Các Thành Phần Chính vì đang trong giai đoạn hoàn thiện nốt project nên em sẽ bổ sung trong thời gian sớm nhất ạ
+ Controllers
+ ![image](https://github.com/user-attachments/assets/418fe191-031d-49d4-8ee6-e51734aa95e0)

+ Models
+ ![image](https://github.com/user-attachments/assets/01757e8a-83ad-4cc3-9e1a-86418fcb4f8b)

+ Views
+ ![image](https://github.com/user-attachments/assets/caa41645-0679-44e1-9c4b-829a71623e2e)

Routes
```<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\AuthController;
/* Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('users',  UserController::class);
    Route::resource('orders', OrderController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('checkout', [OrderController::class, 'create'])->name('checkout.create');
    Route::post('checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
});
// auth
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard cho từng role
Route::middleware(['auth', 'admin'])->get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth'])->get('user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');
```
vì đang trong giai đoạn hoàn thiện nốt project nên em sẽ bổ sung trong thời gian sớm nhất ạ

