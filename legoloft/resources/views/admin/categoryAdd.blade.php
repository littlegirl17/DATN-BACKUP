 @extends('admin.layout.layout')
 @Section('title', 'Admin | Thêm danh mục')
 @Section('content')

     <div class="container-fluid">

         <h3 class="title-page ">
             Thêm danh mục
         </h3>


         <form action="{{ route('categoryAddForm') }}" method="post" class="formAdmin" enctype="multipart/form-data">
             @csrf
             <div class="buttonProductForm">
                 <div class="">
                     <button type="submit" class="btnFormAdd">
                         <p class="text m-0 p-0">Lưu</p>
                     </button>
                 </div>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Tên danh mục</label>
                 <input type="text" class="form-control" name="name" onkeyup="ChangeToSlug();" id="slug"
                     aria-describedby="title" placeholder="Nhập danh mục bài viết">
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Slug</label>
                 <input type="text" class="form-control" name="slug" id="convert_slug" aria-describedby="title"
                     placeholder="Nhập slug">
             </div>
             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả </label>
                 <textarea class="form-control " id="" name="description" rows="6" col="50"></textarea>
             </div>
             <div class="form-group mt-3">
                 <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
                 <div class="custom-file imageAdd p-3 ">
                     <div class="imageFile">
                         <div id="preview"><img src="{{ asset('img/lf.png') }}" alt=""></div>
                     </div>
                     <div class="">
                         <input type="file" name="image" id="HinhAnh" class="inputFile">
                     </div>
                 </div>
             </div>
             <div class="form-group mt-3">
                 <label for="description" class="form-label">Lựa chọn danh mục cha</label>
                 <select class="form-select " name="parent_id">
                     @foreach ($categoryNull as $item)
                         <option value="{{ $item->id }}">
                             {{ $item->name }}
                         </option>
                     @endforeach
                 </select>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Thứ tự xuất hiện</label>
                 <input type="number" class="form-control" name="sort_order" id="" aria-describedby=""
                     placeholder="">
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Danh mục được chọn</label>
                 <select class="form-select" aria-label="Default select example" name="choose">
                     <option value="0">Tắt danh mục được lựa chọn
                     </option>
                     <option value="1">Bật danh mục được lựa chọn
                     </option>
                 </select>
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Trạng thái</label>
                 <select class="form-select" aria-label="Default select example" name="status">
                     <option selected>Trang thái</option>
                     <option value="1">Bật</option>
                     <option value="0">Tắt</option>
                 </select>
             </div>
         </form>
     </div>

 @endsection
