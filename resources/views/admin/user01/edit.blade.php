@extends('admin.main')

@section('content')
<div class="container mt-4">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{  route('admin.user01.update', $user?->id) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới (nếu thay đổi)</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label for="roleid" class="form-label">Quyền</label>
            <select name="roleid" id="roleid" class="form-select" required>
                <option value="1" {{ $user->roleid == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $user->roleid == 2 ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-select" required>
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
