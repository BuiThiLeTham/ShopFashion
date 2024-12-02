<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\Admin\User01Controller;
use App\Http\Controllers\Admin\Users\ForgotPasswordController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\AuthController;

// Route để đăng xuất
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route trang chủ bán hàng
Route::get('/', function () {
    return view('welcome'); // Trang chủ bán hàng (thay bằng trang của bạn)
});

//Phần contact tách riêng
Route::get('contact', [ContactController::class, 'contact'])->name('contact');

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

// Login routes for user01
Route::get('user/login', [UserLoginController::class, 'index'])->name('user.login');
Route::post('user/login/store', [UserLoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        // Routes phần Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        // Routes phần Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        // Routes phần Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        // Routes phần Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        // Routes phần Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });


    Route::prefix('admin/user01')->group(function () {
        Route::get('/', [User01Controller::class, 'index'])->name('admin.user01.index');
        Route::get('/add', [User01Controller::class, 'create']); // Hiển thị form thêm người dùng
        Route::post('/store', [User01Controller::class, 'store'])->name('admin.user01.store'); // Lưu người dùng
        Route::get('/edit/{id}', [User01Controller::class, 'edit'])->name('admin.user01.edit');
        Route::post('/update/{id}', [User01Controller::class, 'update'])->name('admin.user01.update');
        Route::DELETE('/destroy/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.destroy');
        Route::DELETE('/destroy/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.destroy');
        Route::DELETE('/destroy/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.destroy');


        Route::get('/list', [User01Controller::class, 'index']);
    });
    
    Route::middleware('guest')->group(function () {
        Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])
            ->name('password.request');
        Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
            ->name('password.email');
        Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
            ->name('password.reset');
        Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])
            ->name('password.update');
    });

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('search', [App\Http\Controllers\ProductController::class, 'search']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);



// Phần đăng kí
Route::get('admin/users/register', [RegisterController::class, 'index'])->name('register');
Route::post('admin/users/register', [RegisterController::class, 'register']);
});