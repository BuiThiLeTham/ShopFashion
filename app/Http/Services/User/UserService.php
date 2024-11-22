<?php

namespace App\Http\Services\User;

use App\Models\User01;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Thêm người dùng mới
    public function insert($request)
    {
        try {
            // Hash mật khẩu trước khi lưu
            $data = $request->only(['name', 'email', 'password', 'role']);

            $data['password'] = Hash::make($data['password']);

            User01::create($data);

            Session::flash('success', 'Thêm người dùng mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm người dùng lỗi');
            Log::error($err->getMessage());

            return false;
        }

        return true;
    }

    // Lấy danh sách người dùng (phân trang)
    public function get()
    {
        return User01::orderByDesc('id')->paginate(15);
    }

    // Cập nhật thông tin người dùng
    public function update($request, $user)
    {
        try {
            $data = $request->only(['name', 'email', 'password', 'role']);

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            }

            $user->fill($data);
            $user->save();

            Session::flash('success', 'Cập nhật người dùng thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật người dùng lỗi');
            Log::error($err->getMessage());

            return false;
        }

        return true;
    }

    // Xóa người dùng
    public function destroy($request)
    {
        try {
            $user = User01::where('id', $request->input('id'))->first();

            if ($user) {
                $user->delete();
                Session::flash('success', 'Xóa người dùng thành công');
                return true;
            }
        } catch (\Exception $err) {
            Session::flash('error', 'Xóa người dùng lỗi');
            Log::error($err->getMessage());

            return false;
        }

        return false;
    }

    // Lấy thông tin người dùng theo ID
    public function show($id)
    {
        return User01::find($id);
    }
}
