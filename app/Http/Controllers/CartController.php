<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Chức năng thêm sản phẩm vào giỏ hàng
    public function index(Request $request)
    {
        $result = $this->cartService->create($request);

        // Kiểm tra nếu create thất bại, hiện thông báo lỗi
        if ($result === false) {
            Session::flash('error', 'Thêm sản phẩm vào giỏ hàng thất bại!');
            return redirect()->back();
        }

        // Thành công, chuyển hướng đến trang giỏ hàng
        return redirect('/carts');
    }

    // Hiển thị giỏ hàng
    public function show()
    {
        // Lấy giỏ hàng từ session
        $carts = Session::get('carts', []);

        // Lấy danh sách sản phẩm từ CartService
        $products = $this->cartService->getProduct();

        // Chuẩn hóa lại giỏ hàng nếu nó là một mảng đa chiều
        foreach ($products as $product) {
            $product->quantity = isset($carts[$product->id]) ? $carts[$product->id] : 0; 
        }

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => $carts,
        ]);
    }

    // Cập nhật giỏ hàng
    public function update(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'num_product' => 'required|integer|min:1'
        ]);

        $this->cartService->update($validated);

        return redirect('/carts')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id = 0)
    {
        if ($id <= 0) {
            return redirect('/carts')->with('error', 'Sản phẩm không hợp lệ!');
        }

        $this->cartService->remove($id);

        return redirect('/carts')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    // Thêm sản phẩm vào giỏ hàng qua AJAX
    public function addCart(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'num_product' => 'required|integer|min:1'
        ]);

        $result = $this->cartService->create($request);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Thêm sản phẩm vào giỏ hàng thất bại!']);
        }

        // Lấy các sản phẩm trong giỏ hàng và trả về dữ liệu
        $products = $this->cartService->getProduct();

        return response()->json([
            'success' => true,
            'message' => 'Thêm giỏ hàng thành công!',
            'products' => $products, // Gửi lại danh sách sản phẩm mới trong giỏ hàng
        ]);
    }

    // Cập nhật giỏ hàng qua AJAX
    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Cập nhật số lượng sản phẩm trong giỏ hàng (dựa trên cartService hoặc logic trong model)
        $cart = Cart::updateProductQuantity($productId, $quantity);

        if ($cart) {
            return response()->json(['success' => true, 'cart' => $cart]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function delete($id)
{
    // Xử lý xóa sản phẩm khỏi giỏ hàng
    $cart = session()->get('cart');
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        
        // Tính lại tổng giỏ hàng
        $total = 0;
        foreach ($cart as $product) {
            $total += $product['price'] * $product['quantity'];
        }

        // Trả về dữ liệu JSON
        return response()->json(['success' => true, 'total' => number_format($total, 0, '', '.')]);
    }

    return response()->json(['success' => false]);
}

}
