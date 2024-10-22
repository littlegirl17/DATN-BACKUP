 @extends('admin.layout.layoutAdmin')
 @Section('title', 'Admin | Thêm nhóm khách hàng')
 @Section('content')
     <div class="container-fluid">

         <h3 class="title-page ">
             Thêm nhóm khách hàng
         </h3>

         <div class="formAdminAlert">
             <div class="alert alert-danger py-2"></div>
         </div>

         <form action="/admin/add-userGroup" method="post" class="formAdmin">
             <button class="btnFormAdd ">
                 Lưu
             </button>

             <div class="form-group mt-3">
                 <label for="title" class="form-label">Tên nhóm khách hàng</label>
                 <input type="text" class="form-control" name="name" placeholder="Nhập danh mục bài viết">
             </div>
         </form>
     </div>

 @endsection
