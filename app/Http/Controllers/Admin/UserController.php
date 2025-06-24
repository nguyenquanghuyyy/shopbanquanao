<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Danh sách người dùng
    public function index()
    {
    $users = User::paginate(15);
    return view('Admin.AdminUser', [
        'mode' => 'index',
        'users' => $users
    ]);
    }

// Xem chi tiết người dùng
    public function show(User $user)
    {
    return view('Admin.AdminUser', [
        'mode' => 'show',
        'user' => $user
    ]);
    }

// Sửa người dùng
    public function edit(User $user)
    {
    return view('Admin.AdminUser', [
        'mode' => 'edit',
        'user' => $user
    ]);
    }

// Cập nhật người dùng
    public function update(Request $request, User $user)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required|in:user,admin',
    ]);
    $user->update($request->all());
    return redirect()->route('admin.users.index')->with('success', 'Cập nhật người dùng thành công!');
    }

// Xóa người dùng
    public function destroy(User $user)
    {
    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'Xóa người dùng thành công!');
    }

}
