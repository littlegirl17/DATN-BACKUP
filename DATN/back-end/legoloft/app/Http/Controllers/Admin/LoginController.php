<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $administrationModel;

    public function __construct()
    {
        $this->administrationModel = new Administration();
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) { // auth()->guard('admin'): Đây là cách gọi đến guard admin, cho phép bạn xác thực người dùng thuộc loại admin.  // attempt([...]): Phương thức này cố gắng xác thực người dùng với thông tin đã cung cấp (username và password). Nếu xác thực thành công, nó sẽ trả về true.
            $request->session()->regenerate(); // regenerate sử dụng để tạo một ID phiên mới cho người dùng tránh các cuộc tấn công
            $admin = auth()->guard('admin')->user(); // auth:hàm toàn cục dùng để truy cập vào hệ thống xác thực // guard('admin'): guard cho phép bạn xác thực nhiều loại người dùng khác nhau, khi ban gọi f=guard bạn đang mún làm việc với guard dành riêng cho người dùng admin.  // user(): trả về thông tin của người dùng đang login hiện tại

            if ($admin->status >= 1) {
                session()->put('admin', $admin);
                return redirect()->route('adminstration')->with('success', 'Đăng nhập quản trị thành công.');
            } else {
                auth()->guard('admin')->logout();
                return redirect()->back()->with('error', 'Tài khoản quản trị của bạn đã bị khóa');
            }
        } else {
            return redirect()->back()->with(['error' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
        }

        $adminCheckAccount = $this->administrationModel->administrationCheckLogin($request->username);

        if (!$adminCheckAccount) {
            return redirect()->back()->with(['error' => 'Tài khoản không tồn tại!']);
        }
    }
}