<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticleAdminController extends Controller
{
    private $articleModel;

    public function __construct()
    {
        $this->articleModel = new Article();
    }

    public function article(Request $request)
    {
        $query = Article::query(); // Bắt đầu một query mới

        // Lọc theo tiêu đề
        if ($request->filled('filter_name')) {
            $query->where('title', 'like', '%' . $request->filter_name . '%');
        }

        // Lọc theo trạng thái
        if ($request->filled('filter_status')) {
            $query->where('status', $request->filter_status);
        }
        $atc = $query->orderBy('id', 'desc')->get();
        // dd($article);
        return view('admin.article', compact('atc'));
    }

    public function articleAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            // Xác thực dữ liệu
            $request->validate([
                'title' => 'required|string|max:255',
                'description_short' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'required|exists:category_articles,id', // Thêm xác thực cho category_id
            ]);

            // Thêm mới bài viết
            $Article = new Article();
            $Article->title = $request->title;
            $Article->description_short = $request->description_short;
            $Article->description = $request->description;
            $Article->status = $request->status ?? 1;
            $Article->categoryArticle_id = $request->category_id; // Lưu danh mục

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);
                $Article->image = $filename;
            }

            $Article->save();

            return redirect()->route('article')->with('success', 'Bài viết đã được thêm thành công!'); // Chuyển hướng sau khi thêm
        }
        $atc = Article::orderBy('id', 'desc')->get();

        $categoryArticle = CategoryArticle::all(); // Lấy tất cả danh mục

        // Hiển thị form khi là GET request
        return view('admin.articleAdd', compact('categoryArticle', 'atc'));
    }


    public function articleEdit(Request $request, $id)
    {
        $Article = Article::findOrFail($id); // Tìm bài viết theo ID
        $categoryArticle = CategoryArticle::all(); // Lấy tất cả danh mục

        if ($request->isMethod('put')) {
            // Xử lý dữ liệu từ form
            $data = $request->only([
                'title',
                'description_short',
                'description',
                'status',
                'categoryArticle_id' // Sửa lại tên này nếu bạn đã dùng categoryArticle_id trong view
            ]);
            // Xử lý hình ảnh nếu có
            if ($request->hasFile('image')) {
                // Xóa hình ảnh cũ nếu tồn tại
                if ($Article->image) {
                    $oldImagePath = public_path('img' . $Article->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Xóa hình ảnh cũ
                    }
                }

                // Lưu hình ảnh mới
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);
                $data['image'] = $filename; // Cập nhật tên file
            }
            $Article->update($data); // Cập nhật bài viết
            return redirect()->route('article')->with('success', 'Bài viết đã được cập nhật thành công!');
        }

        return view('admin.articleEdit')->with(compact('Article', 'categoryArticle')); // Redirect về danh sách bài viết
    }

    public function articleBulkDelete(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'article_ids' => 'required|array',
            'article_ids.*' => 'exists:articles,id',
        ]);

        // Xóa các bài viết theo ID
        Article::destroy($request->article_ids);

        // Chuyển hướng về danh sách bài viết với thông báo thành công
        return redirect()->route('article')->with('success', 'Đã xóa bài viết thành công!');
    }

public function updateStatusArticle(Request $request, $id)
{
    $article = Article::findOrFail($id);
    $article->status = $request->status;
    $article->save();

    return response()->json(['success' => true]);
}


    public function articleUpdate() {}
}
