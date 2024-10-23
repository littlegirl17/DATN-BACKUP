 @extends('admin.layout.layout')
 @Section('title', 'Admin | Thêm danh mục bài viết')
 @Section('content')

     <div class="container-fluid">

         <h3 class="title-page ">
             Thêm danh mục bài viết
         </h3>


         <form action="{{ route('categoryArticleAdd') }}" method="post" class="formAdmin" enctype="multipart/form-data">
             @csrf
             <div class="buttonProductForm">
                 <div class="">
                     @if (session('error'))
                         <div id="alert-message" class="alertDanger">{{ session('error') }}</div>
                     @endif
                 </div>
                 <div class="">
                     <button type="submit" class="btnFormAdd" id="submit-button">
                         <p class="text m-0 p-0">Lưu</p>
                     </button>
                 </div>
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Tiêu đề bài viết </label>
                 <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" required>
             </div>
             <div class="form-group mt-3">
                 <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
                 <div class="custom-file">
                     <input type="file" name="image" id="HinhAnh">
                     <div id="preview"></div>
                 </div>
             </div>

             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả ngắn</label>
                 <textarea class="form-control ckeditor" id="editor1" name="description_short" rows="10" col="80"></textarea>
             </div>

             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả </label>
                 <textarea class="form-control ckeditor" id="editor1" name="description" rows="10" col="80"></textarea>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Trạng thái</label>
                 <select class="form-select" aria-label="Default select example" name="status" required>
                     <option value="" disabled selected> Chon Trang thái</option>
                     <option value="1">Bật</option>
                     <option value="0">Tắt</option>
                 </select>
             </div>
         </form>
     </div>

 @endsection
