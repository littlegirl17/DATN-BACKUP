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
        $assembly->status = $request->status;
        $assembly->save();

        return redirect()->route('assembly')->with('success', 'Người dùng đã được cập nhật thành công.');
    }
}
