<?php

namespace App\Http\Controllers\admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Administration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $administrationModel;
    private $employeeModel;


    public function __construct()
    {
        $this->administrationModel = new Administration();
        $this->employeeModel = new Employee();
    }


    public function logout(Request $request)
    {
        Auth::logout(); // xóa thông tin xác thực của người dùng khỏi phiên làm việc.
        $request->session()->invalidate();  // xóa tất cả dữ liệu trong session ngăn chặn sự dụng phiên cũ
        $request->session()->regenerateToken(); // tạo một CSRF token mới
        $request->session()->flush(); // xóa tất cả dữ liệu trong phiên hiện tại.
        return redirect()->route('adminLoginForm');
    }

    /*---------------------------------------------------------------- */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'account_type' => 'required', // Bắt buộc chọn loại tài khoản
        ]);

        $credentials = ['username' => $request->username, 'password' => $request->password];

        // Xác thực dựa trên loại tài khoản
        if ($request->account_type == 'admin') {
            $adminCheckAccount = $this->administrationModel->administrationCheckLogin($credentials['username']);
            if (!$adminCheckAccount) {
                return redirect()->back()->with(['error' => 'Tài khoản không tồn tại trong hệ thống!']);
            }
            if (auth()->guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                $admin = auth()->guard('admin')->user();

                if ($admin->status >= 1) {
                    session()->put('admin', $admin);
                    return redirect()->route('dashboard')->with('success', 'Đăng nhập quản trị thành công.');
                } else {
                    auth()->guard('admin')->logout();
                    return redirect()->back()->with('error', 'Tài khoản quản trị của bạn đã bị khóa.');
                }
            }
        } elseif ($request->account_type == 'employee') {
            $employeeCheckAccount = $this->employeeModel->employeeCheckLogin($credentials['username']);
            if (!$employeeCheckAccount) {
                return redirect()->back()->with(['error' => 'Tài khoản không tồn tại trong hệ thống!']);
            }
            if (auth()->guard('employee')->attempt($credentials)) {
                $request->session()->regenerate();
                $employee = auth()->guard('employee')->user();

                if ($employee->status >= 1) {
                    session()->put('employee', $employee);
                    return redirect()->route('dashboard')->with('success', 'Đăng nhập nhân viên thành công.');
                } else {
                    auth()->guard('employee')->logout();
                    return redirect()->back()->with('error', 'Tài khoản nhân viên của bạn đã bị khóa.');
                }
            }
        }

        // Nếu thông tin không hợp lệ
        return redirect()->back()->with(['error' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
    }
}
