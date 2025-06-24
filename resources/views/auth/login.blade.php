@extends('layout.AuthLayout')

@section('title', 'Đăng nhập')

@section('content')
    <h2>Đăng nhập</h2>
    @if ($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required autofocus>
        <label>Mật khẩu:</label>
        <input type="password" name="password" required>
        <button type="submit">Đăng nhập</button>
    </form>
    <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
@endsection
