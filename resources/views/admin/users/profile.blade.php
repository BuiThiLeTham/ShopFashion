

 @extends('main') <!-- Sử dụng layout nếu có -->

@section('content')
<div class="container" style="margin-top: 80px;">
    <h1>Thông tin cá nhân</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Sử dụng PUT để cập nhật thông tin -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Tên người dùng:</strong></h5>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-3" required>

                <p class="card-text"><strong>Email:</strong></p>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-3" required>

                 <p class="card-text"><strong>SĐT:</strong></p>
                <input type="text" name="SĐT" value="{{ $user->SĐT }}" class="form-control mb-3">

                <p class="card-text"><strong>Địa chỉ:</strong></p>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control mb-3">                

                <p class="card-text"><strong>Ngày tạo tài khoản:</strong></p>
                <input type="text" value="{{ $user->created_at->format('d/m/Y') }}" class="form-control mb-3" disabled>


                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <input type="submit" value="Lưu" class="btn btn-primary btn-lg">
            </div>
        </div>
    </form>
</div>
@endsection 
