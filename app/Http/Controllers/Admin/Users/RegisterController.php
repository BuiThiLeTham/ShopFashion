<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use ValidatesRequests;
    // Hiển thị form đăng ký
    public function index()
    {
        return view('admin.users.register', ['title' => 'Register']);
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'status' => '1',  // Gán giá trị cho trường status (mặc định là 'active')
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,  // Gán mặc định là User
            'status' => 1, // Gán giá trị mặc định cho status
            'SĐT' => null,
            'birthday' => null,
            'address' => null,
        ]);

        // // Đăng nhập người dùng ngay sau khi đăng ký (nếu cần)
        // auth()->login($user);
        Session::flash('success', 'Registration successful! You can now log in.');

        return redirect()->route('login'); // Chuyển hướng tới trang chủ hoặc nơi bạn muốn
    }
}
