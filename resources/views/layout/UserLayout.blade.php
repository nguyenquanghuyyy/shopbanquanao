<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Shop Quần Áo')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @yield('styles')
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background: #f8fafc;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        /* Header */
        header {
            background: #fff;
            box-shadow: 0 2px 8px #eee;
            position: fixed;
            width: 100%;
            z-index: 50;
            top: 0;
            left: 0;
        }
        nav {
            padding: 16px 0;
        }
        .nav-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #22223b;
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 40px;
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 4px;
            margin-right: 12px;
            background: #fff;
            box-shadow: 0 2px 8px #eee;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .nav-menu > a,
        .nav-menu > .dropdown > button {
            color: #4a5568;
            text-decoration: none;
            font-size: 1rem;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s;
        }
        .nav-menu > a:hover,
        .nav-menu > .dropdown > button:hover {
            color: #2563eb;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            left: 0;
            top: 120%;
            min-width: 180px;
            background: #fff;
            box-shadow: 0 2px 8px #eee;
            border-radius: 6px;
            padding: 8px 0;
            z-index: 100;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            display: block;
            padding: 8px 18px;
            color: #4a5568;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .dropdown-content a:hover {
            background: #f1f5f9;
            color: #2563eb;
        }
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .nav-icons a {
            color: #4a5568;
            font-size: 1.2rem;
            position: relative;
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-icons a:hover {
            color: #2563eb;
        }
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e3342f;
            color: #fff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
            box-shadow: 0 2px 6px #ccc;
        }
        .user-dropdown {
            position: relative;
        }
        .user-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 120%;
            min-width: 180px;
            background: #fff;
            box-shadow: 0 2px 8px #eee;
            border-radius: 6px;
            padding: 8px 0;
            z-index: 100;
        }
        .user-dropdown:hover .user-dropdown-content {
            display: block;
        }
        .user-dropdown-content a,
        .user-dropdown-content button {
            display: block;
            width: 100%;
            padding: 8px 18px;
            color: #4a5568;
            background: none;
            border: none;
            text-align: left;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .user-dropdown-content a:hover,
        .user-dropdown-content button:hover {
            background: #f1f5f9;
            color: #2563eb;
        }
        /* Main content */
        main {
            flex-grow: 1;
            padding-top: 90px;
        }
        /* Footer */
        footer {
            background: #22223b;
            color: #fff;
            margin-top: auto;
        }
        .footer-container {
            padding: 48px 0 0 0;
            max-width: 1200px;
            margin: 0 auto;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 32px;
        }
        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            nav .nav-menu {
                gap: 32px;
            }
        }
        .footer-section h3 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 14px;
        }
        .footer-section p,
        .footer-section ul,
        .footer-section li {
            color: #bfc0c0;
            font-size: 1rem;
        }
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        .footer-section ul li {
            margin-bottom: 8px;
        }
        .footer-section ul li a {
            color: #bfc0c0;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-section ul li a:hover {
            color: #fff;
        }
        .footer-social {
            display: flex;
            gap: 14px;
        }
        .footer-social a {
            color: #bfc0c0;
            font-size: 1.2rem;
            transition: color 0.2s;
        }
        .footer-social a:hover {
            color: #fff;
        }
        .footer-contact p {
            margin-bottom: 8px;
        }
        .footer-bottom {
            border-top: 1px solid #393963;
            margin-top: 48px;
            padding: 24px 0;
            text-align: center;
            color: #bfc0c0;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="container">
            <div class="nav-flex">
                <!-- Logo -->
                <div class="logo">
                    
                        <img src="{{ asset('images/logooo.jpg') }}" alt="Logo" class="logo">
                    
                </div>
                <!-- Desktop Navigation -->
                <div class="nav-menu">
                    <a href="{{  route('user.dashboard') }}">Trang chủ</a>
                    <a href="{{  route('user.products.index') }}">Sản phẩm</a>
                    <a href="{{  route('about')}}">About us</a>
                    
                </div>
                <!-- Right Side Icons -->
                <div class="nav-icons">          
                    <a href="/cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge">
                            {{ \App\Models\Cart::totalItems() }}
                        </span>
                    </a>
                    @auth
                        <div class="user-dropdown">
                            <button><i class="fas fa-user"></i></button>
                            <div class="user-dropdown-content">
                                <a href="{{  route('user.profile.edit') }}">Tài khoản</a>
                                <a href="{{ route('user.orders.index') }}">Đơn hàng</a>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login">Đăng nhập</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <!-- About Section -->
                <div class="footer-section">
                    <h3>Về chúng tôi</h3>
                    <p>Shop thời trang uy tín, chất lượng hàng đầu Việt Nam</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <!-- Quick Links -->
                
                <!-- Customer Service -->
                
                <!-- Contact Info -->
                <div class="footer-section footer-contact">
                    <h3>Liên hệ</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Đường ABC, Quận XYZ, TP.HCM</p>
                    <p><i class="fas fa-phone"></i> 1900 1234</p>
                    <p><i class="fas fa-envelope"></i> contact@shopquanao.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; {{ date('Y') }} Shop Quần Áo. All rights reserved.
            </div>
        </div>
    </footer>
    @yield('scripts')
</body>
</html>
