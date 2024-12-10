@extends('admin.main')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .container-fluid {
        margin-top: 20px; /* Tạo khoảng cách phía trên */
    }

    .small-box {
        margin-bottom: 20px; /* Tạo khoảng cách giữa các box */
    }

    .small-box .inner {
        padding: 20px; /* Thêm padding cho nội dung bên trong box */
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Menu::count() }}</h3>
                    <p>Tổng Số Danh Mục</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Product::count() }}</h3>
                    <p>Tổng Số Sản Phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Slider::count() }}</h3>
                    <p>Tổng Số Slider</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>

        <!-- Thống kê tổng số đơn hàng -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ \App\Models\Cart::count() }}</h3>
                    <p>Tổng Số Đơn Hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cart"></i>
                </div>
            </div>
        </div>

        <!-- Thống kê tổng doanh thu -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format(\App\Models\Cart::totalRevenue(), 0, ',', '.') }} VNĐ</h3> <!-- Định dạng số tiền -->
                    <p>Tổng Doanh thu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <h4>Thống kê doanh thu từng sản phẩm</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Doanh Thu (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Cart::revenueByProduct() as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->product->name ?? 'Sản phẩm không tồn tại' }}</td>
                            <td>{{ number_format($data->total_revenue, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
