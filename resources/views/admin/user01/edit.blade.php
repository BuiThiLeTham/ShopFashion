@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên Người Dùng</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nhập tên người dùng">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Nhập email">
            </div>

            <div class="form-group">
                <label>Vai Trò</label>
                <select name="role" class="form-control">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active"
                           name="active" {{ $user->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                           name="active" {{ $user->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
        </div>
        @csrf
    </form>
@endsection
