<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    
    // Tìm kiếm theo tên sản phẩm (hoặc tùy chỉnh theo yêu cầu)
    $products = $this->productService->searchByName($query);

    return view('products.search', [
        'title' => 'Search Results',
        'products' => $products,
        'query' => $query
    ]);
}


    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }
}
