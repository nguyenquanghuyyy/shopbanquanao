<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors(['email' => 'Sai thông tin đăng nhập']);
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user',
    ]);
    // Không tự động Auth::login($user);
    return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
