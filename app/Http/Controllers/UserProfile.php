<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('User.UserProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Nếu người dùng muốn đổi mật khẩu
        if ($request->filled('current_password') || $request->filled('new_password')) {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required', 'min:6', 'confirmed'],
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
            }

            $user->password = bcrypt($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.profile.edit')->with('success', 'Cập nhật thông tin thành công!');
    }
}
