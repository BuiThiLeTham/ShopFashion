<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Truyền giá trị $title vào view
        return view('admin.home', ['title' => 'Trang chủ Admin']);
    }
}
