<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Phương thức để đăng xuất
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/admin/users/login'); // Chuyển hướng về trang đăng nhập
    }
}
?>