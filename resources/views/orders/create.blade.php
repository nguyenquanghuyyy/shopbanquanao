@extends('layouts.simple')

@section('content')
    <h2>Thêm đơn hàng</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Khách hàng:</label>
        <select name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>Ảnh sản phẩm:</label>
        <input type="file" name="image" accept="image/*">
        <br>
        <label>Sản phẩm:</label>
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>Số lượng:</label>
        <input type="number" name="quantity" min="1" required value="{{ old('quantity') }}">
        <br>
        <label>Ngày đặt:</label>
        <input type="date" name="order_date" required value="{{ old('order_date') }}">
        <br>
        <button type="submit">Lưu</button>
    </form>
@endsection
