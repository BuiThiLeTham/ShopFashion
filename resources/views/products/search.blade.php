@extends('main')

@section('content')
    <div class="container p-t-80">
        <h1 class="mtext-105 cl2 p-b-20">
        Kết quả tìm kiếm cho "{{ $query }}"
        </h1>
        <div class="row">
            @if($products->isEmpty())
                <p>Không tìm thấy sản phẩm nào phù hợp.</p>
            @else
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name) }}.html" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    View Product
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name) }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>
                                    <span class="stext-105 cl3">
                                        ${{ $product->price }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {!! $products->links() !!}
    </div>
@endsection
