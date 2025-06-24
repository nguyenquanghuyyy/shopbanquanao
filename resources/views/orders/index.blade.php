@extends('layouts.simple')
@section('content')
    <h2>Danh sách đơn hàng</h2>
    <a href="{{ route('orders.create') }}">Thêm đơn hàng</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Ngày đặt</th>
            <th>Hành động</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->order_date }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}">Xem</a>
                <a href="{{ route('orders.edit', $order->id) }}">Sửa</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection