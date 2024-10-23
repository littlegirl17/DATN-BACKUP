<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Categories();
    }

    public function category()
    {
        $categoriAdmin = Categories::with(['categories_children', 'categories_children.product'])->whereNull('parent_id')->get();

        return view('admin.category', compact('categoriAdmin'));
    }

    public function categoryEdit($id)
    {
        $category = $this->categoryModel->findOrFail($id);
        $categoryNull = Categories::with(['categories_children', 'categories_children.product'])->whereNull('parent_id')->get();
        return view('admin.categoryEdit', compact('category', 'categoryNull'));
    }


    public function categoryUpdate(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {

            $category = $this->categoryModel->findOrFail($id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->sort_order = $request->sort_order;
            $category->status = $request->status;
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->choose = $request->choose;
            if ($request->hasFile('image')) {
                // Lấy tên gốc của tệp
                $image = $request->file('image');

                $imageName = "{$category->id}.{$image->getClientOriginalExtension()}";

                $image->move(public_path('img/'), $imageName);

                $category->image = $imageName;

                $category->save();
            }

            $category->save();

            return redirect()->route('category')->with('success', 'Cập nhật danh mục thành công.');
        }
        return view('admin.categoryEdit');
    }

    public function categoryAdd(Request $request)
    {
        if ($request->isMethod('POST')) {
            $category = new Categories();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->sort_order = $request->sort_order;
            $category->status = $request->status;
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->choose = $request->choose;
            if ($request->hasFile('image')) {
                // Lấy tên gốc của tệp
                $image = $request->file('image');

                $imageName = "{$category->id}.{$image->getClientOriginalExtension()}";

                $image->move(public_path('img/'), $imageName);

                $category->image = $imageName;

                $category->save();
            }

            $category->save();

            return redirect()->route('category')->with('success', 'Thêm danh mục thành công.');
        }
        $categoryNull = Categories::with(['categories_children', 'categories_children.product'])->whereNull('parent_id')->get();
        return view('admin.categoryAdd', compact('categoryNull'));
    }

    public function categoryUpdateStatus() {}
    public function categoryDeleteCheckbox() {}
    public function categorySearch() {}
}
