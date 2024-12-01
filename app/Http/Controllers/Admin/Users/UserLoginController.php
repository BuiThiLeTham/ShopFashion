<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login', [
            'title' => 'Đăng Nhập Người Dùng'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::guard('user01')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {

            return redirect()->route('home'); // Route home hoặc bất kỳ
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}
