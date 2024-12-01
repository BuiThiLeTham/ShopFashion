{{-- @extends('head')

@section('content') --}}
<div class="container">
    <h1>Thanh toán đơn hàng</h1>
    {{-- {{ route('order.payment') }} --}}
    <form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="payment_method">Chọn phương thức thanh toán</label>
        
        <!-- Radio button cho COD -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" required>
            <label class="form-check-label" for="cod">
                Thanh toán khi nhận hàng
            </label>
        </div>

        <!-- Radio button cho VNPAY -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="VNPAY" required>
            <label class="form-check-label" for="vnpay">
                Thanh toán qua VNPAY
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Đặt hàng</button>
</form>

{{-- @endsection --}}
