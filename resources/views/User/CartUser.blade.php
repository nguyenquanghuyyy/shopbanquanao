@extends('layout.UserLayout')

@section('title', 'Giỏ hàng của bạn')

@section('content')
    <h2>Giỏ hàng của bạn</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Kiểm tra $items có sản phẩm không --}}
    @if($items->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    <tr>
                        <td>
                            @if($item->product->image)
                                <img src="{{ asset('images/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="max-width: 80px;">
                            @else
                                <span>Chưa có ảnh</span>
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->product->price, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                            </form>
                        </td>
                        <td>
                            @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                            {{ number_format($subtotal, 0, ',', '.') }} VNĐ
                        </td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right"><strong>Tổng cộng:</strong></td>
                    <td colspan="2"><strong>{{ number_format($total, 0, ',', '.') }} VNĐ</strong></td>
                </tr>
            </tfoot>
        </table>
        <div style="margin-top: 24px;">
            <a href="{{ route('user.order.create') }}" class="btn btn-success">Tiến hành đặt hàng</a>
        </div>
    @else
        <div class="alert alert-info" style="margin-top: 20px;">
            Giỏ hàng của bạn đang trống.
        </div>
    @endif

    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center;}
        th { background: #f1f3f5; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;}
        .btn-primary { background: #364fc7; color: #fff; }
        .btn-danger { background: #e03131; color: #fff; }
        .btn-success { background: #38c172; color: #fff; }
        .btn-sm { font-size: 0.9em; padding: 4px 8px; }
        .alert-success { background: #e6fcf5; color: #0b7285; border: 1px solid #b2f2e5; border-radius: 4px; padding: 10px 14px; margin-bottom: 16px; }
        .alert-info { background: #e7f5ff; color: #1864ab; border: 1px solid #a5d8ff; border-radius: 4px; padding: 10px 14px; }
    </style>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>