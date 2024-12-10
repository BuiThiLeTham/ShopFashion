<style>
   /* Tổng quan */
.isotope-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

/* Card sản phẩm */
.block2 {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    height: 100%; /* Đảm bảo chiều cao của box luôn đầy đủ */
}

.block2:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
}

/* Ảnh sản phẩm */
.block2-pic {
    position: relative;
    overflow: hidden;
    height: 200px; /* Giới hạn chiều cao của ảnh */
}

.block2-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
}

.block2-pic:hover img {
    transform: scale(1.1);
}

/* Nội dung sản phẩm */
.block2-txt {
    padding: 15px;
    height: 100px;
    text-align: left;
    flex-grow: 1; /* Đảm bảo phần nội dung chiếm hết không gian còn lại */
}

.block2-txt-child1 {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Tên sản phẩm */
.block2-txt-child1 a {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: #333;
    text-decoration: none;
    transition: color 0.3s;
}

.block2-txt-child1 a:hover {
    color: #007bff;
}

/* Giá sản phẩm */
.block2-txt-child1 .stext-105 {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    font-weight: bold;
    color: #e74c3c;
}   
</style>
<div class="row isotope-grid">
    @foreach($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
							{!!  \App\Helpers\Helper::price($product->price, $product->price_sale)  !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
