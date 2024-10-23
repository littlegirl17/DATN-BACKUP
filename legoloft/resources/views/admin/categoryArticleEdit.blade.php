 @extends('admin.layout.layout')
 @Section('title', 'Admin | Chỉnh sửa danh mục bài viết')
 @Section('content')

     <div class="container-fluid">

         <h3 class="title-page ">
             Chỉnh sửa danh mục bài viết
         </h3>

         <form action="{{ route('categoryArticleEdit', $categoryArticle->id) }}" method="post" class="formAdmin"
             enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="buttonProductForm">
                 <div class=""></div>
                 <div class="">
                     <button type="submit" class="btnFormAdd">
                         <p class="text m-0 p-0">Lưu</p>
                     </button>
                 </div>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Tiêu đề bài viết</label>
                 <input type="text" class="form-control" value="{{ old('title', $categoryArticle->title) }}"
                     name="title" placeholder="Nhập danh mục bài viết">
             </div>

             <div class="form-group mt-3">
                 <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
                 <div class="custom-file">
                     <input type="file" name="image" id="HinhAnh">

                     @if ($categoryArticle->image)
                         <img src="{{ asset('img/' . $categoryArticle->image) }}" alt="Hình ảnh hiện tại"
                             style="max-width: 100px; max-height: 100px;">
                     @else
                         <div id="preview"></div>
                     @endif
                 </div>
             </div>

             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả ngắn</label>
                 <textarea class="form-control ckeditor" id="" name="description_short" rows="10">{{ old('description_short', $categoryArticle->description_short) }}</textarea>
             </div>

             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả</label>
                 <textarea class="form-control ckeditor" id="" name="description" rows="15">{{ old('description', $categoryArticle->description) }}</textarea>
             </div>

             <div class="form-group mt-3">
                 <label for="status" class="form-label">Trạng thái</label>
                 <select class="form-select" name="status" required>
                     <option value="1" {{ old('status', $categoryArticle->status) == 1 ? 'selected' : '' }}>Bật
                     </option>
                     <option value="0" {{ old('status', $categoryArticle->status) == 0 ? 'selected' : '' }}>Tắt
                     </option>
                 </select>
             </div>
         </form>

     </div>

 @endsection