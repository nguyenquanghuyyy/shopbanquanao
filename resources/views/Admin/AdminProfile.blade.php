@extends('layout.AdminLayout')
@section('title', 'Thông tin cá nhân')
@section('content')
    <style>
        .profile-container {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 16px #e0e0e0;
            padding: 32px 28px 24px 28px;
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #364fc7;
        }
        .profile-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }
        .profile-form input[type="text"],
        .profile-form input[type="email"],
        .profile-form input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .profile-form hr {
            margin: 28px 0 18px 0;
            border: none;
            border-top: 1px solid #eee;
        }
        .profile-form button {
            width: 100%;
            background: #364fc7;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 0;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .profile-form button:hover {
            background: #5c7cfa;
        }
        .alert {
            background: #e6fcf5;
            color: #0b7285;
            border: 1px solid #b2f2e5;
            border-radius: 4px;
            padding: 10px 14px;
            margin-bottom: 16px;
        }
        .alert-danger {
            background: #fff0f0;
            color: #e03131;
            border: 1px solid #ffa8a8;
        }
        .logout-btn {
            display: block;
            width: 100%;
            margin-top: 18px;
            background: #e03131;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 0;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .logout-btn:hover {
            background: #c92a2a;
        }
    </style>

    <div class="profile-container">
        <h2>Thông tin cá nhân</h2>

        {{-- Hiển thị thông báo lỗi --}}
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif

        {{-- Hiển thị thông báo thành công --}}
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form class="profile-form" action="{{ route('admin.profile.update') }}" method="POST" autocomplete="off">
            @csrf
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

            <hr>
            <h4 style="margin-bottom: 12px; color: #364fc7;">Đổi mật khẩu</h4>
            <label for="current_password">Mật khẩu hiện tại:</label>
            <input type="password" name="current_password" id="current_password" autocomplete="current-password">

            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" id="new_password" autocomplete="new-password">

            <label for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" autocomplete="new-password">

            <button type="submit">Cập nhật thông tin</button>
        </form>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn" type="submit">Đăng xuất</button>
        </form>
    </div>
@endsection

