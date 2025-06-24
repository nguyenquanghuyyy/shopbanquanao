<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đơn hàng</title>
</head>
<body>
    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif
    @yield('content')
</body>
</html>
