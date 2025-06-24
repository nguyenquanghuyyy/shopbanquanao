<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
/* Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('users',  UserController::class);
    Route::resource('orders', OrderController::class);
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth'])->group(function () {
    Route::get('user/products', [UserProductController::class, 'index'])->name('user.products.index');
    Route::get('user/products/search', [UserProductController::class, 'search'])->name('user.products.search');
    Route::get('user/products/{product}', [UserProductController::class, 'show'])->name('user.products.show');

    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('checkout', [UserOrderController::class, 'create'])->name('user.order.create');
    Route::post('checkout', [UserOrderController::class, 'store'])->name('user.order.store');
    Route::get('user/orders', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('user/orders/{order}', [UserOrderController::class, 'show'])->name('user.orders.show');
    Route::delete('user/orders/{order}', [UserOrderController::class, 'destroy'])->name('user.orders.destroy');

    Route::get('profile', [UserProfile::class, 'edit'])->name('user.profile.edit');
    Route::post('profile', [UserProfile::class, 'update'])->name('user.profile.update');
    Route::get('/about', function () {
    return view('user.about');})->name('about');
    Route::get('user/dashboard', [UserHomeController::class, 'index'])->name('user.dashboard');
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

/*Route::middleware(['auth'])->get('user/dashboard', function () {
    return view('User.HomeUser');
})->name('user.dashboard');*/