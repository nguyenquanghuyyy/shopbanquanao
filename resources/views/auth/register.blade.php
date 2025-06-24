@extends('layout.AuthLayout')

@section('title', 'Đăng ký')

@section('content')
    <h2>Đăng ký</h2>
    @if ($errors->any())
        <div class="alert" style="background:#f8d7da;color:#721c24;">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div>
            <label>Họ tên:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Đăng ký</button>
    </form>
@endsection
