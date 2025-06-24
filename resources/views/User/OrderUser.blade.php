@extends('layout.UserLayout')

@section('title', 'Đơn hàng của tôi')

@section('content')
    @if(isset($mode) && $mode === 'index')
        <h2>Đơn hàng của tôi</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($orders->count() === 0)
            <p>Bạn chưa có đơn hàng nào.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>
                                <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                <form action="{{ route('user.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @elseif(isset($mode) && $mode === 'create')
        <h2>Xác nhận đơn hàng</h2>
        @if($cart && $items->count())
            <ul>
                @foreach($items as $item)
                    <li>
                        {{ $item->product->name }} - SL: {{ $item->quantity }} - Giá: {{ number_format($item->product->price) }} VNĐ
                    </li>
                @endforeach
            </ul>
            <form action="{{ route('user.order.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
        @else
            <p>Giỏ hàng trống.</p>
        @endif
    @elseif(isset($mode) && $mode === 'show')
        <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
        <p>Ngày đặt: {{ $order->order_date }}</p>
        <p>Tổng tiền: {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
        <h4>Danh sách sản phẩm:</h4>
        @if($order->orderItems->count())
            <ul>
                @foreach($order->orderItems as $item)
                    <li>
                        {{ $item->product->name ?? 'Sản phẩm đã xóa' }} -
                        SL: {{ $item->quantity }} -
                        Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ
                    </li>
                @endforeach
            </ul>
        @else
            <p>Đơn hàng không có sản phẩm nào.</p>
        @endif   
    @endif

    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center;}
        th { background: #f1f3f5; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;}
        .btn-primary { background: #364fc7; color: #fff; }
        .btn-danger { background: #e03131; color: #fff; }
        .btn-sm { font-size: 0.9em; padding: 4px 8px; }
        .alert-success { background: #e6fcf5; color: #0b7285; border: 1px solid #b2f2e5; border-radius: 4px; padding: 10px 14px; margin-bottom: 16px; }
        .alert-danger { background: #fff0f0; color: #e03131; border: 1px solid #ffa8a8; border-radius: 4px; padding: 10px 14px; margin-bottom: 16px; }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif
            @if(session('error'))
                alert('{{ session('error') }}');
            @endif
        });
    </script>
@endsection
