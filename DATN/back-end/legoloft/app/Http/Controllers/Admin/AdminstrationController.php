<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\AdministrationGroup;
use App\Http\Controllers\Controller;

class AdminstrationController extends Controller
{
    private $administrationModel;
    private $administrationGroupModel;

    public function __construct()
    {
        $this->administrationModel = new Administration();
        $this->administrationGroupModel = new AdministrationGroup();
    }

    public function administrationSearch(Request $request)
    {
        $fillter_name = $request->input('filter_name');
        $filter_adminGroup = $request->input('filter_adminGroup');
        $administration = $this->administrationModel->searchAdministration($fillter_name, $filter_adminGroup);
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll(); //lấy ra tên nhóm người dùng để lọc
        return view('admin.administration', compact('administration', 'administrationGroup'));
    }

    public function adminstration()
    {
        $administration = $this->administrationModel->administrationAll();
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll(); //lấy ra tên nhóm người dùng để lọc

        return view('admin.administration', compact('administration', 'administrationGroup'));
    }
    public function adminstrationAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'fullname' => 'required | string | max:255',
                'username' => 'required | string | unique:administrations,username',
                'admin_group_id' => 'required | exists:administration_groups,id',
                'email' => 'required | email | unique:administrations,email',
                'password' => 'required | confirmed',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required | in:0,1',
            ]);
            try {
                $administration = $this->administrationModel;
                $administration->fullname = $request->fullname;
                $administration->username = $request->username;
                $administration->admin_group_id = $request->admin_group_id;
                $administration->email = $request->email;
                $administration->password = bcrypt($request->password);
                $administration->image = '';
                $administration->status = $request->status;
                $administration->save();

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = "{$administration->id}.{$image->getClientOriginalExtension()}";
                    $image->move(public_path('img/'), $imageName);
                    $administration->image = $imageName;
                    $administration->save();
                }
                return redirect()->route('adminstration')->with('success', 'Thêm người dùng thành công');
            } catch (\Throwable $th) {
                $error = $th->getMessage();
                return redirect()->back()->with(['error' => $error]);
            }
        }
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll();
        return view('admin.administrationAdd', compact('administrationGroup'));
    }
    public function adminstrationEdit($id)
    {
        $administration = $this->administrationModel->findOrFail($id);
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll();
        return view('admin.administrationEdit', compact('administration', 'administrationGroup'));
    }

    public function adminstrationUpdate(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|unique:administrations,username,' . $id,
            'admin_group_id' => 'required|exists:administration_groups,id',
            'email' => 'required|email|unique:administrations,email,' . $id,
            'password' => 'nullable|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);
        $administration = $this->administrationModel->findOrFail($id);
        $administration->fullname = $request->fullname;
        $administration->username = $request->username;
        $administration->admin_group_id = $request->admin_group_id;
        $administration->email = $request->email;
        $administration->status = $request->status;
        if ($request->filled('password')) {        // Chỉ cập nhật mật khẩu nếu người dùng đã nhập mật khẩu mới
            $administration->password = bcrypt($request->password);
        }
        $administration->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "{$administration->id}.{$image->getClientOriginalExtension()}";
            $image->move(public_path('img/'), $imageName);
            $administration->image = $imageName;
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $administration->image = $administration->image;
        }

        $administration->save();

        return redirect()->route('adminstration')->with('success', 'Thêm người dùng thành công');
    }

    public function adminstrationUpdateStatus(Request $request, $id)
    {
        $administration = $this->administrationModel->findOrFail($id);
        $administration->status = $request->status;
        $administration->save();
        return response()->json(['success' => true]);
    }

    public function adminstrationDeleteCheckbox(Request $request)
    {
        $administration_id = $request->input('administration_id');
        if ($administration_id) {
            foreach ($administration_id as $itemID) {
                $administration = $this->administrationModel->findOrFail($itemID);
                $administration->delete();
            }
        }
        return redirect()->route('adminstration')->with('success', 'Xóa người dùng thành công.');
    }

    /* ----------------------------------------------------------------------Quản trị nhóm người dùng-----------------------------------------------------------------*/
    public function adminstrationGroup()
    {
        $administrationGroup = $this->administrationGroupModel->administrationGroupAll();
        return view('admin.administrationGroup', compact('administrationGroup'));
    }

    public function adminstrationGroupAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required | string',
                'permission' => 'required',
            ]);

            try {
                $adminstrationGroup = $this->administrationGroupModel;
                $adminstrationGroup->name  = $request->name;
                $adminstrationGroup->permission  = json_encode($request->permission); // chuyển array thành string
                $adminstrationGroup->save();
                return redirect()->route('adminstrationGroup')->with('success', 'Thêm nhóm người dùng thành công.');
            } catch (\Throwable $th) {
                return back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại.']);
            }
        }
        return view('admin.administrationGroupAdd');
    }

    public function adminstrationGroupEdit($id)
    {
        $administrationGroup = $this->administrationGroupModel->findOrFail($id);
        $permissionGroupGet = json_decode($administrationGroup->permission, true) ?? [];
        return view('admin.administrationGroupEdit', compact('administrationGroup', 'permissionGroupGet')); // Giai mã một chuôi JSON thành 1 mảng liên kết or đối tượng PHP

    }

    public function adminstrationGroupUpdate(Request $request, $id)
    {
        $administrationGroup = $this->administrationGroupModel->findOrFail($id);
        $administrationGroup->name = $request->name;
        $administrationGroup->permission = json_encode($request->permission);
        $administrationGroup->save();
        return redirect()->route('adminstrationGroup');
    }

    public function adminstrationGroupDeleteCheckbox(Request $request)
    {
        $administrationGroup_id = $request->input('administrationGroup_id');
        if ($administrationGroup_id) {
            foreach ($administrationGroup_id as $itemID) {
                $administrationGroup = $this->administrationGroupModel->findOrFail($itemID);
                $countAdministrationGroup = $this->administrationModel->countAdministrationGroup($itemID);
                if ($countAdministrationGroup > 0) {
                    return redirect()->route('adminstrationGroup')->with('error', ' Cảnh báo: Nhóm người dùng này không thể bị xóa vì nó hiện được chỉ định cho ' . $countAdministrationGroup . ' người dùng!');
                } else {
                    $administrationGroup->delete();
                    return redirect()->route('adminstrationGroup')->with('success', ' Thành công: Nhóm người dùng này đã được xóa');
                }
            }
        }
        return redirect()->route('adminstrationGroup')->with('success', 'Xóa nhóm người dùng thành công.');
    }
}
