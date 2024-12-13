@extends('main')

@section('content')
    <div class="bg0 m-t-23 p-b-140 p-t-80">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                   <h1>{{ $title }}</h1>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
    

               <!-- Search product -->
               <div class="panel-search w-full p-t-10 p-b-15">
    <form action="/search" method="GET" class="bor8 dis-flex p-l-15">
        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" type="submit">
            <i class="zmdi zmdi-search"></i>
        </button>
        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="query" placeholder="Search">
        
    </form>
</div>

                </div>
                
            </div>

            @include('products.list')

            {!! $products->links() !!}
        </div>
    </div>
@endsection
