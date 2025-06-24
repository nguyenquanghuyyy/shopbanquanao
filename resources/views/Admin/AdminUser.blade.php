@extends('layout.AdminLayout')
@section('title', 'Quản lý Người dùng')
@section('content')
    <h2>Quản lý Người dùng</h2>

    @if($mode === 'index')
        {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-success" style="margin-bottom: 16px;">+ Thêm người dùng</a>--}}
        <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">Xem</a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa người dùng này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    @if($mode === 'show')
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Chi tiết người dùng</h3>
        <p><strong>Tên:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Vai trò:</strong> {{ $user->role }}</p>
        <p><strong>Ngày tạo:</strong> {{ $user->created_at }}</p>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa người dùng này?')">Xóa</button>
        </form>
    @endif

    @if($mode === 'edit')
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Sửa người dùng</h3>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')
            <label>Tên:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
            <label>Vai trò:</label>
            <select name="role">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        </form>
    @endif

  {{--   @if($mode === 'create')
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">← Quay lại</a>
        <h3>Thêm người dùng mới</h3>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <label>Tên:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
            <label>Vai trò:</label>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    @endif
--}}
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
