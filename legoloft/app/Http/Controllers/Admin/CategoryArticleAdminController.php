<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Schema;
// use App\Models\CategoryArticle;
class CategoryArticleAdminController extends Controller
{
    private $categoryArticleModel;

    public function __construct()
    {
        $this->categoryArticleModel = new CategoryArticle();
    }

    public function categoryArticle(Request $request)
    {
        $query = CategoryArticle::query(); // Khởi tạo query


        // Lọc theo tên
        if ($request->has('filter_name') && $request->filter_name !== '') {
            $query->where('title', 'like', '%' . $request->filter_name . '%');
        }

        // Lọc theo trạng thái
        if ($request->has('filter_status') && $request->filter_status !== '') {
            $query->where('status', $request->filter_status);
        }
        // Lấy danh sách danh mục
        $CA = $query->orderBy('id', 'desc')->get();

        return view('admin.categoryArticle', compact('CA'));
    }

    public function categoryArticleAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            // Xác thực dữ liệu
            $request->validate([
                'title' => 'required|string|max:255',
                'description_short' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Thêm mới bài viết
            $categoryArticle = new CategoryArticle();
            $categoryArticle->title = $request->title;
            $categoryArticle->description_short = $request->description_short;
            $categoryArticle->description = $request->description;
            $categoryArticle->status = $request->status ?? 1;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);
                $categoryArticle->image = $filename;
            }

            $categoryArticle->save();
            return redirect()->route('categoryArticle');
        }

        // Hiển thị form khi là GET request
        return view('admin.categoryArticleAdd');
    }





    public function categoryArticleEdit(Request $request, $id)
    {
        // Tìm danh mục theo ID
        $categoryArticle = CategoryArticle::findOrFail($id);

        if ($request->isMethod('put')) {
            $data = $request->only([
                'title',
                'description_short',
                'description',
                'status'
            ]);

            // Kiểm tra hợp lệ
            $request->validate([
                'title' => 'required|string|max:255',
                'description_short' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra hình ảnh
            ]);

            // Xử lý hình ảnh nếu có
            if ($request->hasFile('image')) {
                // Xóa hình ảnh cũ nếu tồn tại
                if ($categoryArticle->image) {
                    $oldImagePath = public_path('img/' . $categoryArticle->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Xóa hình ảnh cũ
                    }
                }

                // Lưu hình ảnh mới
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);
                $data['image'] = $filename; // Cập nhật tên file vào dữ liệu
            }

            // Cập nhật danh mục
            $categoryArticle->update($data);

            return redirect()->route('categoryArticle')->with('success', 'Cập nhật thành công!');
        }

        // Trả về view với biến đã được định nghĩa
        return view('admin.categoryArticleEdit', ['categoryArticle' => $categoryArticle]);
    }




    public function bulkDelete(Request $request)
    {
        $request->validate([
            'category_ids' => 'required|array',
        ]);

        // Kiểm tra từng danh mục trong mảng category_ids
        foreach ($request->category_ids as $id) {
            $articleCount = Article::where('categoryArticle_id', $id)->count();
            if ($articleCount > 0) {
                return redirect()->route('categoryArticle')->with('error', 'Không thể xóa danh mục có ID ' . $id . ' vì còn bài viết liên quan.');
            }
        }

        // Nếu không có bài viết liên quan, tiến hành xóa
        CategoryArticle::destroy($request->category_ids);

        return redirect()->route('categoryArticle')->with('success', 'Danh mục đã được xóa thành công!');
    }

    public function updateStatus(Request $request, $id)
    {
        $category = CategoryArticle::findOrFail($id);
        $category->status = $request->status;
        $category->save();

        return response()->json(['success' => true]);
    }





    public function categoryArticleUpdate() {}
}
