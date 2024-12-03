<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User01;
use Illuminate\Http\Request;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class User01Controller extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Hiển thị form thêm người dùng
    public function create()
    {
        return view('admin.user01.add', [
            'title' => 'Thêm Người Dùng Mới'
        ]);
    }

    // Lưu người dùng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'roleid' => 'required|in:1,2',
        ]);

        $this->userService->insert($request);

        return redirect()->back()->with('success', 'Người dùng đã được thêm thành công.');
    }

    // Hiển thị danh sách người dùng
    public function index()
    {
        return view('admin.user01.list', [
            'title' => 'Danh Sách Người Dùng',
            'users' => $this->userService->get()
        ]);
    }

    // Hiển thị form chỉnh sửa người dùng
    // public function show(User01 $user)
    // {
    //     return view('admin.user01.edit', [
    //         'title' => 'Chỉnh Sửa Người Dùng',
    //         'user' => $user
    //     ]);
    // }
    

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            Session::flash('error', 'Người dùng không tồn tại');
            return redirect()->route('admin.user01.list');
        }

        return view('admin.user01.edit', [
            'title' => 'Chỉnh sửa người dùng',
            'user' => $user
        ]);
    }
    // Cập nhật thông tin người dùng
public function update(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        Session::flash('error', 'Người dùng không tồn tại.');
        return redirect()->route('admin.user01.list');
    }

    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'roleid' => 'required|in:1,2',
    ]);

    $user->update($request->all());
    Session::flash('success', 'Cập nhật người dùng thành công.');
    return redirect()->route('admin.user01.list');
}

    // Xóa người dùng
public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'error' => true,
            'message' => 'Người dùng không tồn tại.'
        ]);
    }

    $user->delete();

    return response()->json([
        'error' => false,
        'message' => 'Xóa người dùng thành công.'
    ]);
}


}
