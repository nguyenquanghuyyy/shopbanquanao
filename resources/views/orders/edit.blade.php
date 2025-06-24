@extends('layouts.simple')

@section('content')
    <h2>Sửa đơn hàng</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Khách hàng:</label>
        <select name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" 
                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>Sản phẩm:</label>
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}" 
                    {{ old('product_id', $order->product_id) == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>Số lượng:</label>
        <input type="number" name="quantity" min="1" value="{{ old('quantity', $order->quantity) }}" required>
        <br>
        <label>Ngày đặt:</label>
        <input type="date" name="order_date" value="{{ old('order_date', $order->order_date) }}" required>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
@endsection
