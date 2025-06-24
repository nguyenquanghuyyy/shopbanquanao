<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .admin-header {
            background: #22223b; color: #fff; padding: 16px 0;
            display: flex; align-items: center; justify-content: space-between;
        }
        .admin-header .logo {
            display: flex; align-items: center;
        }
        .admin-header .logo img {
            height: 40px; margin-right: 12px;
        }
        .admin-header .admin-info {
            margin-right: 32px;
        }
        .admin-sidebar {
            width: 220px; background: #4a4e69; color: #fff; min-height: 100vh; float: left;
            padding-top: 32px; box-sizing: border-box;
        }
        .admin-sidebar a {
            display: block; color: #fff; text-decoration: none;
            padding: 12px 32px; margin-bottom: 6px; font-weight: 500;
            transition: background 0.2s;
        }
        .admin-sidebar a.active, .admin-sidebar a:hover {
            background: #9a8c98;
        }
        .admin-content {
            margin-left: 220px; padding: 32px;
        }
        .logout-btn {
            background: #c9184a; color: #fff; border: none; border-radius: 4px;
            padding: 8px 16px; cursor: pointer; font-weight: bold;
        }
        @media (max-width: 700px) {
            .admin-sidebar { width: 100%; float: none; min-height: auto; }
            .admin-content { margin-left: 0; padding: 16px; }
        }
        .btn-profile {
        background: #5c7cfa;
        color: #fff;
        padding: 6px 14px;
        border-radius: 4px;
        text-decoration: none;
        margin-left: 12px;
        font-weight: bold;
        border: none;
        transition: background 0.2s;
        }
        .btn-profile:hover {
        background: #364fc7;
        }
        .logout-btn {
        background: #e3342f;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 6px 14px;
        margin-left: 8px;
        font-weight: bold;
        cursor: pointer;
        }
        .logo {
        float: left;
        border: 2px solid #ccc; 
        border-radius: 8px;   
        padding: 4px;          
        height: 40px;          
        margin-right: 12px;    
        }

    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="{{ asset('images/logooo.jpg') }}" alt="Logo" />
            <span style="font-size: 1.5rem; font-weight: bold;">Admin Dashboard</span>
        </div>
        <div class="admin-info">
            @auth
                Xin chào, {{ Auth::user()->name }} ({{ Auth::user()->role }})
             <a href="{{ route('admin.profile.edit') }}" class="btn btn-secondary">Profile</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button class="logout-btn" type="submit">Đăng xuất</button>
            </form>
        @endauth
    </div>
    </header>
    <aside class="admin-sidebar">
        <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Quản lý Đơn hàng</a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Quản lý Sản phẩm</a>
        <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Quản lý Người dùng</a>
    </aside>
    <main class="admin-content">
        @yield('content')
    </main>
</body>
</html>
