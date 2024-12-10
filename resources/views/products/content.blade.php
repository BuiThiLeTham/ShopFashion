<style>
    /* Tổng quan */

/* Breadcrumb */
.bread-crumb {
    background-color: #ffffff;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.2);
}

.bread-crumb a {
    color: #007bff;
    font-weight: 600;
    text-decoration: none;
}

.bread-crumb a:hover {
    color: #0056b3;
}

.bread-crumb span {
    font-weight: bold;
    color: #555;
}

/* Hộp bao quanh cả nội dung và ảnh */
.product-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    margin-bottom: 20px;
}
#add-to-cart-btn {
    display: block;
    text-align: center;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

#add-to-cart-btn:hover {
    background-color: #0056b3;
}
.product-card .product-title {
    font-family: 'Roboto', sans-serif;
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.4;
    padding: 5px 0;
    transition: color 0.3s;
}

.product-card .product-title:hover {
    color: #55acee;
}

/* Giá sản phẩm */
.product-card .product-price {
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    font-weight: bold;
    color: #e74c3c;
    margin-bottom: 15px;
    padding: 5px 0;
    border-bottom: 1px dashed #ccc;
}

/* Mô tả sản phẩm */
.product-card .product-description {
    font-family: serif;
    font-size: 14px;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
    padding: 5px 0;
    transition: color 0.3s;
}
/* Mô tả chi tiết sản phẩm */
.product-detail-description {
    margin-top: 30px;
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-detail-description h4 {
    font-family: sans-serif;
    font-size: 22px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.product-detail-description p {
    font-family: serif;
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin: 0;
    padding: 0 10px;
}

</style>
@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
        <div class="product-box">
            <div class="row">
                <!-- Phần nội dung và form -->
                <div class="col-md-6 col-lg-5 p-b-30 order-lg-1 product-card">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14 product-title">
                            {{ $title }}
                        </h4>

                        <span class="mtext-106 cl2 product-price">
							{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
						</span>

                        <p class="stext-102 cl3 p-t-23 product-description">
                            {{ $product->description }}
                        </p>

                        <!-- Form mua hàng -->
                        <div class="p-t-33">
                            <div class="flex-w  p-b-10">
                                   <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="num_product" value="1">
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                                                             <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
                                               THÊM GIỎ HÀNG
                                            </button>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @endif
                                        @csrf
                                    </form>
                                </div>
                     
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phần ảnh -->
                <div class="col-md-6 col-lg-7 p-b-30 order-lg-2 product-card">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">

                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="images/product-detail-01.jpg" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-detail-description">
    <h4>Mô tả chi tiết</h4>
    <p>
        Đây là phần mô tả chi tiết sản phẩm với các thông tin bổ sung quan trọng.
        Bạn có thể tùy chỉnh nội dung này để phù hợp với sản phẩm cụ thể.
    </p>
</div>

        </div> 
    </section>
@endsection
