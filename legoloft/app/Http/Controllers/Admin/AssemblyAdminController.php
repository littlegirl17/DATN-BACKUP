<?php

namespace App\Http\Controllers\admin;

use App\Models\Assembly;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssemblyAdminController extends Controller
{
    private $assemblyModel;
    private $employeeModel;

    public function __construct()
    {
        $this->assemblyModel = new Assembly();
        $this->employeeModel = new Employee();
    }

    public function assembly()
    {
        $assemblys =   $this->assemblyModel->assemblyAll();
        return view('admin.assembly', compact('assemblys'));
    }

    public function assemblyEdit($id)
    {
        $assembly = $this->assemblyModel->findOrFail($id);
        $statusAssembly = $this->assemblyModel->statusAssembly();

        return view('admin.assemblyEdit', compact('assembly', 'statusAssembly'));
    }

    public function assemblyUpdate(Request $request, $id)
    {

        $assembly = Assembly::findOrFail($id); // Tìm người dùng theo ID
        $statues = $request->status;
        switch ((int)$statues) {
            case 1:
                if ($assembly->status != 1) {
                    return redirect()->route('assembly')->with('error', 'Không thể chuyển về trạng thái "đơn lắp mới"!');
                }
                break;
            case 2:
                if ($assembly->status != 1) {
                    return redirect()->route('assembly')->with('error', 'Không thể chuyển về trạng thái "Đang trong quá trình lắp ráp"!');
                }
                break;
            case 3:
                if ($assembly->status != 2) {
                    return redirect()->route('assembly')->with('error', 'Không thể chuyển về trạng thái "Hoàn thành lắp ráp"!');
                }
                break;
            default:
                # code...
                break;
        }
        $assembly->status = $statues;
        $assembly->save();

        return redirect()->route('assembly')->with('success', 'Người dùng đã được cập nhật thành công.');
    }
}