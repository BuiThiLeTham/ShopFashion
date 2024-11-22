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
            // Routes phần user01
            Route::prefix('admin/user01')->group(function () {
                Route::get('/add', [User01Controller::class, 'create']);
                Route::post('/add', [User01Controller::class, 'store']);
Route::get('/edit/{id}', [User01Controller::class, 'update']);
Route::post('/update/{id}', [User01Controller::class, 'update']);
Route::post('/delete/{id}', [User01Controller::class, 'destroy']);
Route::get('/list', [User01Controller::class, 'show']);

                // Route::post('/add', [User01Controller::class, 'create']);
                // Route::get('/edit/{id}', [User01Controller::class, 'update']);
                // Route::post('/update/{id}', [User01Controller::class, 'update']);
                // Route::post('/delete/{id}', [User01Controller::class, 'destroy']);
                // Route::get('/list', [User01Controller::class, 'show']);


                // Route::get('list', [SliderController::class, 'index']);
                // Route::get('edit/{slider}', [SliderController::class, 'show']);
                // Route::post('edit/{slider}', [SliderController::class, 'update']);
                // Route::DELETE('destroy', [SliderController::class, 'destroy']);
            });

    // Route::prefix('admin/user01')->group(function () {
    //     Route::get('/', [User01Controller::class, 'index'])->name('admin.user01.index');
    //     Route::get('/edit/{id}', [User01Controller::class, 'edit'])->name('admin.user01.edit');
    //     Route::post('/update/{id}', [User01Controller::class, 'update'])->name('admin.user01.update');
    //     Route::post('/delete/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.delete');
    // });
});
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::prefix('admin/user01')->group(function () {
//         Route::get('/', [User01Controller::class, 'index'])->name('admin.user01.index');
//         Route::get('/edit/{id}', [User01Controller::class, 'edit'])->name('admin.user01.edit');
//         Route::post('/update/{id}', [User01Controller::class, 'update'])->name('admin.user01.update');
//         Route::post('/delete/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.delete');
//     });
// });

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

