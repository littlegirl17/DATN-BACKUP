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

    public function employeeAdd(Request $request)
    {
        if ($request->isMethod('POST')) {

            // Xác thực dữ liệu
            $request->validate([
                'fullname' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,',
                'password' => 'nullable|string|min:8|confirmed',
                'phone' => 'nullable|string|max:15',
                'admin_group_id' => 'required|exists:administration_groups,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $employee = new Employee(); // Tìm người dùng theo ID
            $employee->fullname = $request->fullname;
            $employee->username = $request->username;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->admin_group_id = $request->admin_group_id;
            if ($request->filled('password')) {
                $employee->password = bcrypt($request->password);
            }

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
            return redirect()->route('employee')->with('success', 'Người dùng đã được thêm thành công.');
        }

        $administrationGroup = $this->administrationGroupModel->administrationGroupAll();
        return view('admin.employeeAdd', compact('administrationGroup'));
    }


    public function employeeUpdateStatus(Request $request, $id)
    {
        $employee = $this->employeeModel->findOrFail($id);
        $employee->status = $request->status;
        $employee->save();
        return response()->json(['success' => true]);
    }

    public function employeeDeleteCheckbox(Request $request)
    {
        $employee_id = $request->input('employee_id');
        if ($employee_id) {
            foreach ($employee_id as $itemID) {
                $employee = $this->employeeModel->findOrFail($itemID);
                $countAssembly = $this->assemblyModel->countAssembly($itemID);
                if ($countAssembly > 0) {
                    return redirect()->route('employee')->with('error', ' Cảnh báo: Nhân viên này không thể xóa vì nó hiện được chỉ định cho ' . $countAssembly . ' sản phẩm lắp ráp!');
                } else {
                    $employee->delete();
                }
            }
            return redirect()->route('employee')->with('success', 'Xóa nhân viên thành công.');
        }
    }

    public function employeeSearch(Request $request)
    {
        //Lấy từ khóa tìm kiếm từ yêu cầu
        $filter_fullname = $request->input('filter_fullname');
        $filter_username = $request->input('filter_username');

        $filter_status = $request->input('filter_status');

        $employees = $this->employeeModel->searchEmployee($filter_fullname, $filter_username, $filter_status);

        return view('admin.employee', compact('employees', 'filter_fullname', 'filter_username'));
    }
}
