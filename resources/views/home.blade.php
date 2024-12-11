@extends('main')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($sliders as $slider)

                    <div class="item-slick1" style="background-image: url({{ $slider->thumb }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1  visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                HOT 2024
                            </span>
                                </div>

                                <div class="layer-slick1  visible-false" data-appear="fadeInUp" data-delay="0">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->name }}
                                    </h2>
                                </div>

                                <div class="layer-slick1  visible-false" data-appear="zoomIn" data-delay="0">
                                    <a href="{{ $slider->url }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Xem Ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Mới
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Tất Cả Sản Phẩm
                    </button>
                </div>
            
                <div class="bor8 dis-flex p-l-15">
    <form action="/search" method="GET" class="w-full">
        <div class="dis-flex">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="query" placeholder="Search">
        </div>
    </form>
</div>

                </div>
            </div>
            
            <div id="loadProduct">
                @include('products.list')
            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Xem Thêm
                </a>
            </div>
        </div>
    </section>
@endsection
