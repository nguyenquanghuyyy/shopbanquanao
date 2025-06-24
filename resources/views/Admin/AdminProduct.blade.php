@extends('layout.AdminLayout')
@section('title', 'Quản lý Sản phẩm')
@section('content')
    <h2>Quản lý Sản phẩm</h2>

    @if($mode === 'index')
        <a href="{{ route('admin.products.create') }}" class="btn btn-success" style="margin-bottom: 16px;">+ Thêm sản phẩm</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:120px;">
                 @else
                    <span>Chưa có ảnh</span>
                @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">Xem</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    @if($mode === 'show')
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Chi tiết sản phẩm</h3>
        @if($product->image)
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:200px;">
        @else
            <span>Chưa có ảnh</span>
        @endif
        <p><strong>Tên:</strong> {{ $product->name }}</p>
        <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
        <p><strong>Mô tả:</strong> {{ $product->description }}</p>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
        </form>
    @endif

    @if($mode === 'edit')
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Sửa sản phẩm</h3>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
            <label>Ảnh sản phẩm:</label>
            <input type="file" name="image" accept="image/*">
            @if($product->image)
                <div>
                    <img src="{{ asset('images/' . $product->image) }}" alt="Ảnh hiện tại" style="max-width: 120px;">
                </div>
            @endif
            <label>Giá:</label>
            <input type="number" name="price" value="{{ $product->price }}" required>
            <label>Mô tả:</label>
            <textarea name="description">{{ $product->description }}</textarea>
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        </form>
    @endif

    @if($mode === 'create')
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Thêm sản phẩm mới</h3>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" required>
            <label>Ảnh sản phẩm:</label>
            <input type="file" name="image" accept="image/*">
            <label>Giá:</label>
            <input type="number" name="price" required>
            <label>Mô tả:</label>
            <textarea name="description"></textarea>
            <button type="submit" class="btn btn-success">Thêm</button>
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
