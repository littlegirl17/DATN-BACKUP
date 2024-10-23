 @extends('admin.layout.layout')
 @Section('title', 'Admin | Sửa danh mục')
 @Section('content')

     <div class="container-fluid">

         <div class="d-flex justify-content-end align-items-center  my-3">

             <a class="text-decoration-none text-light bg-31629e py-2 px-2" href="">Quay
                 lại</a>
         </div>

         <form action="{{ route('categoryUpdate', $category->id) }}" method="post" class="formAdmin"
             enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="buttonProductForm">
                 <div class="">
                     <h3 class="title-page ">
                         Chỉnh sửa danh mục
                     </h3>
                 </div>
                 <div class="">
                     <button type="submit" class="btnFormAdd">
                         <p class="text m-0 p-0">Lưu</p>
                     </button>
                 </div>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Tên danh mục</label>
                 <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" name="name"
                     value="{{ $category->name }}">
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Slug</label>
                 <input type="text" class="form-control" id="convert_slug" name="slug" value="{{ $category->slug }}">
             </div>
             <div class="form-group mt-3">
                 <label for="description" class="form-label">Mô tả </label>
                 <textarea class="form-control " id="" name="description" rows="6" col="50">{{ $category->description }}</textarea>
             </div>
             <div class="form-group mt-3">
                 <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
                 <div class="custom-file">
                     <input type="file" name="image" id="HinhAnh">
                     <img src="{{ asset('img/' . $category->image) }}" alt=""
                         style="width:80px; height:80px; object-fit:cover;">
                 </div>
             </div>
             <div class="form-group mt-3">
                 <label for="description" class="form-label">Lựa chọn danh mục cha</label>
                 <select class="form-select " name="parent_id">
                     @foreach ($categoryNull as $item)
                         <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : 0 }}>
                             {{ $item->name }}
                         </option>
                     @endforeach
                 </select>
             </div>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Thứ tự xuất hiện</label>
                 <input type="text" class="form-control" name="sort_order" value="{{ $category->sort_order }}">
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Danh mục được chọn</label>
                 <select class="form-select" aria-label="Default select example" name="choose">
                     <option value="0"{{ $category->choose == 0 ? 'selected' : '' }}>Tắt danh mục được lựa chọn
                     </option>
                     <option value="1"{{ $category->choose == 1 ? 'selected' : '' }}>Bật danh mục được lựa chọn
                     </option>
                 </select>
             </div>
             <div class="form-group mt-3">
                 <label for="title" class="form-label">Trạng thái</label>
                 <select class="form-select" aria-label="Default select example" name="status">
                     <option value="0"{{ $category->status == 0 ? 'selected' : '' }}>Tắt</option>
                     <option value="1"{{ $category->status == 1 ? 'selected' : '' }}>Bật</option>
                 </select>
             </div>
         </form>
     </div>

 @endsection
