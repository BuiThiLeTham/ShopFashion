<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

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


public function show()
{
    // Kiểm tra nếu session 'carts' có tồn tại và là mảng
    $carts = Session::get('carts', []);

    // Nếu carts là mảng, thì lấy sản phẩm từ CartService
    $products = $this->cartService->getProduct();

    return view('carts.list', [
        'title' => 'Giỏ Hàng',
        'products' => $products,
        'carts' => $carts,  // Truyền mảng giỏ hàng vào view
    ]);
}



public function update(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|integer',
        'num_product' => 'required|integer|min:1'
    ]);

    $this->cartService->update($validated);

    return redirect('/carts')->with('success', 'Cập nhật giỏ hàng thành công!');
}

public function remove($id = 0)
{
    if ($id <= 0) {
        return redirect('/carts')->with('error', 'Sản phẩm không hợp lệ!');
    }

    $this->cartService->remove($id);

    return redirect('/carts')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
}


// public function addCart(Request $request)
// {
//     $validated = $request->validate([
//         'product_id' => 'required|integer',
//         'num_product' => 'required|integer|min:1'
//     ]);

//     // $this->cartService->addCart($validated);

//     // return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
//     $product_id = $request->input('product_id');
//     $num_product = $request->input('num_product', 1);
//     $product = Product::find($product_id);
//     if (!$product) {
//         return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại!']);
//     }
//     return response()->json(['success' => true, 'message' => 'Thêm giỏ hàng thành công!']);
// }
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

public function updateCart(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Update the quantity of the product in the cart (You should have a cart service or logic here)
    $cart = Cart::updateProductQuantity($productId, $quantity);

    if ($cart) {
        return response()->json(['success' => true, 'cart' => $cart]);
    } else {
        return response()->json(['success' => false]);
    }
}

}
