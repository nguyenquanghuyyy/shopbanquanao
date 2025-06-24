@extends('layouts.simple')
@section('content')
    <h2>Chi tiết đơn hàng</h2>
    <p><strong>ID:</strong> {{ $order->id }}</p>
    <p><strong>Khách hàng:</strong> {{ $order->user->name }}</p>
    <p><strong>Sản phẩm:</strong> {{ $order->product->name }}</p>
    <p><strong>Số lượng:</strong> {{ $order->quantity }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
    <a href="{{ route('orders.index') }}">Quay lại danh sách</a>
@endsection
