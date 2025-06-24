@extends('layout.AdminLayout')
@section('title', 'Quản lý Đơn hàng')
@section('content')
    <h2>Quản lý Đơn hàng</h2>

    @if($mode === 'index')
        <table>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
                <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Xem</a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa đơn hàng này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    @if($mode === 'show')
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
        <p><strong>Khách hàng:</strong> {{ $order->user->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
        <p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
        <h4>Sản phẩm</h4>
        <ul>
            @foreach($order->orderItems as $item)
                <li>
                    {{ $item->product->name }} x {{ $item->quantity }}
                    ({{ number_format($item->price, 0, ',', '.') }} VNĐ)
                </li>
            @endforeach
        </ul>
        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Sửa</a>
        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa đơn hàng này?')">Xóa</button>
        </form>
    @endif

    @if($mode === 'edit')
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Sửa đơn hàng #{{ $order->id }}</h3>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf @method('PUT')
            <label>Trạng thái:</label>
            <select name="status">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
            </select>
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        </form>
    @endif

    <style>
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 4px;}
        .btn-primary { background: #3490dc; color: #fff; }
        .btn-warning { background: #fbbf24; color: #222; }
        .btn-danger { background: #e3342f; color: #fff; }
        .btn-success { background: #38c172; color: #fff; }
        .btn-secondary { background: #6c757d; color: #fff; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;}
        th { background: #eee; }
    </style>
@endsection
