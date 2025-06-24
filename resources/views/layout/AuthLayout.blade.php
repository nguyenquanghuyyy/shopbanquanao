<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Đăng nhập')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f0f2f5; font-family: Arial, sans-serif; }
        .auth-container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 8px #ddd;
            padding: 32px 24px;
        }
        h2 { text-align: center; margin-bottom: 24px; }
        .alert { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; }
        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;
        }
        button { width: 100%; padding: 10px; background: #3490dc; color: #fff; border: none; border-radius: 4px; }
        a { color: #3490dc; text-decoration: none; display: block; text-align: center; margin-top: 12px; }
    </style>
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>
