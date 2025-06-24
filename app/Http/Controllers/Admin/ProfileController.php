<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('Admin.AdminProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        // Nếu admin nhập mật khẩu mới, kiểm tra và đổi mật khẩu
        if ($request->filled('current_password') || $request->filled('new_password')) {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Kiểm tra mật khẩu hiện tại đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        // Cập nhật mật khẩu mới
        $user->password = bcrypt($request->new_password);
        }

        // Cập nhật thông tin khác
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.profile.edit')->with('success', 'Cập nhật thông tin thành công!');
    }
}

