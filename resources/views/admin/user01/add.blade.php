@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form  action="{{ route('admin.user01.store') }}" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên Người Dùng</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập email">
            </div>

            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>

            <div class="form-group">
                <label>Vai Trò</label>
                <select name="role_id" class="form-control">
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Người Dùng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
