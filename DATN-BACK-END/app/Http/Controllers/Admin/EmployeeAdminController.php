<?php

namespace App\Http\Controllers\admin;

use App\Models\Assembly;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\AdministrationGroup;
use App\Http\Controllers\Controller;

class EmployeeAdminController extends Controller
{
    private $assemblyModel;
    private $employeeModel;
    private $administrationGroupModel;

    public function __construct()
    {
        $this->assemblyModel = new Assembly();
        $this->employeeModel = new Employee();
        $this->administrationGroupModel = new AdministrationGroup();
    }

    public function employee()
    {
        $employees =   $this->employeeModel->employeeAll();

        return view('admin.employee', compact('employees'));
    }

    public function employeeEdit($id)
    {
        $employee = $this->employeeModel->findOrFail($id);
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll();
        return view('admin.employeeEdit', compact('employee', 'administrationGroup'));
    }

    public function employeeUpdate(Request $request, $id)
    {

        // Xác thực dữ liệu
        $request->validate([
            '   fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'admin_group_id' => 'required|exists:administration_groups,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::findOrFail($id); // Tìm người dùng theo ID
        $employee->fullname = $request->fullname;
        $employee->username = $request->username;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->admin_group_id = $request->admin_group_id;
        if ($request->filled('password')) {
            $employee->password = bcrypt($request->password);
        }
        $employee->phone = $request->phone;

        if ($request->hasFile('image')) {
            // Lấy tên gốc của tệp
            $image = $request->file('image');

            $imageName = "{$employee->id}.{$image->getClientOriginalExtension()}";

            $image->move(public_path('img/'), $imageName);

            $employee->image = $imageName;

            $employee->save();
        }


        $employee->status = $request->status;
        $employee->save();

        return redirect()->route('employee')->with('success', 'Người dùng đã được cập nhật thành công.');
    }
}