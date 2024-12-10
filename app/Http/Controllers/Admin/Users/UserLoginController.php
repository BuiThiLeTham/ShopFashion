<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function settings(Request $request){


    }

    public function profile(Request $request, $id)
    {
        $user = User::findOrFail($id); // Try fetching the user with a static ID
        return view('admin.users.profile', [
            'user' => $user,
            'title' => 'Thông Tin Người Dùng'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users,email,' . $id,
            'SĐT' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        

        // Lấy user theo ID
        $user = User::findOrFail($id);

        // Cập nhật thông tin
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->SĐT = $request->input('SĐT');
        $user->address = $request->input('address');

        // Lưu lại vào database
        $user->save();

        // Chuyển hướng về trang profile với thông báo thành công
        return redirect()->route('user.profile', $user->id)->with('success', 'Thông tin cá nhân đã được cập nhật!');
    }


}
