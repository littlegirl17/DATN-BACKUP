 @extends('admin.layout.layout')
 @Section('title', 'Admin | Danh mục')
 @Section('content')

     <div class="container-fluid">

         <div class="searchAdmin">
             <form id="filterFormCategory" action="{{ route('searchCategory') }}" method="GET">
                 <div class="row d-flex flex-row justify-content-between align-items-center">
                     <div class="col-sm-6">
                         <div class="form-group mt-3">
                             <label for="title" class="form-label">Tên danh mục</label>
                             <input class="form-control rounded-0" name="filter_name" placeholder="Tên danh mục"
                                 type="text" value="">
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group mt-3">
                             <label for="title" class="form-label">Trạng thái</label>
                             <select class="form-select  rounded-0" aria-label="Default select example"
                                 name="filter_status">
                                 <option value="">Tất cả</option>
                                 <option value="1">Kích hoạt
                                 </option>
                                 <option value="0">Vô hiệu hóa
                                 </option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="d-flex justify-content-end align-items-end">
                     <button type="submit" class="btn borrder-0 rounded-0 text-light my-3 " style="background: #4099FF"><i
                             class="fa-solid fa-filter pe-2" style="color: #ffffff;"></i>Lọc danh
                         mục</button>
                 </div>
             </form>
         </div>
         <form id="submitFormAdmin">
             <div class="buttonProductForm mt-3">
                 <div class="m-0 p-0">
                     @if (session('error'))
                         <div id="alert-message" class="alertDanger">{{ session('error') }}</div>
                     @endif
                     @if (session('success'))
                         <div id="alert-message" class="alertSuccess">{{ session('success') }}</div>
                     @endif
                 </div>
                 <div class="m-0 p-0">

                     <button class="btn btnF1">
                         <a href="{{ route('categoryAdd') }}" class="text-decoration-none text-light"><i
                                 class="pe-2 fa-solid fa-plus" style="color: #ffffff;"></i>Tạo danh mục</a>
                     </button>
                     <button class="btn btnF2" type="button" onclick="">
                         <i class="pe-2 fa-solid fa-trash" style="color: #ffffff;"></i>Xóa danh mục
                     </button>
                 </div>
             </div>
             <div class="border p-2">
                 <h4 class="my-2"><i class="pe-2 fa-solid fa-list"></i>Danh Sách Danh Mục</h4>

                 <table class="table table-bordered pt-3">
                     <thead class="table-header">
                         <tr>
                             <th class=" py-2"></th>
                             <th class=" py-2">Hình ảnh</th>
                             <th class=" py-2">Tên danh mục</th>
                             <th class=" py-2">Thứ tự</th>
                             <th class=" py-2">Trạng thái</th>
                             <th class=" py-2">Hành động</th>
                         </tr>
                     </thead>
                     <tbody class="table-body">

                         @foreach ($categoriAdmin as $category)
                             <tr class="">
                                 <td>
                                     <div class="d-flex justify-content-center align-items-center">
                                         <input type="checkbox" id="cbx_{{ $category->id }}" class="hidden-xs-up"
                                             name="category_id[]" value="{{ $category->id }}">
                                         <label for="cbx_{{ $category->id }}" class="cbx"></label>
                                     </div>
                                 </td>
                                 <td class="">
                                     <img src="{{ asset('img/lf.png') }}" alt=""
                                         style="width: 80px; height: 80px; object-fit: contain;">
                                 </td>
                                 <td class="nameAdmin">
                                     <p>{{ $category->name }} (danh mục cha)</p>
                                 </td>
                                 <td class=""></td>
                                 <td></td>
                                 <td class="">
                                     <div class="actionAdminProduct m-0 py-3">
                                         <button class="btnActionProductAdmin2"><a
                                                 href="{{ route('editCategory', $category->id) }}"
                                                 class="text-decoration-none text-light"><i class="pe-2 fa-solid fa-pen"
                                                     style="color: #ffffff;"></i>Sửa lại danh mục</a></button>
                                     </div>
                                 </td>
                             </tr>

                             <!-- Lặp qua các danh mục con -->
                             @foreach ($category->categories_children as $childCategory)
                                 <tr class="">
                                     <td>
                                         <div class="d-flex justify-content-center align-items-center">
                                             <input type="checkbox" id="cbx_{{ $childCategory->id }}" class="hidden-xs-up"
                                                 name="category_id[]" value="{{ $childCategory->id }}">
                                             <label for="cbx_{{ $childCategory->id }}" class="cbx"></label>
                                         </div>
                                     </td>
                                     <td class="">
                                         <img src="{{ asset('img/' . $childCategory->image) }}" alt=""
                                             style="width: 80px; height: 80px; object-fit: contain;">
                                     </td>
                                     <td class="nameAdmin">
                                         <p>{{ $category->name }} > {{ $childCategory->name }}</p>
                                         <!-- Hiển thị danh mục cha > danh mục con -->
                                     </td>
                                     <td class=""></td>
                                     <td class="">
                                         <div class="form-check form-switch">
                                             <input class="form-check-input" type="checkbox" role="switch"
                                                 data-id="{{ $childCategory->id }}" id="flexSwitchCheckChecked"
                                                 style="font-size:20px;">
                                             <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                         </div>
                                     </td>
                                     <td class="">
                                         <div class="actionAdminProduct m-0 py-3">
                                             <button class="btnActionProductAdmin2"><a
                                                     href="{{ route('editCategory', $childCategory->id) }}"
                                                     class="text-decoration-none text-light"><i
                                                         class="pe-2 fa-solid fa-pen" style="color: #ffffff;"></i>Sửa lại
                                                     danh mục</a></button>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                         @endforeach

                     </tbody>
                 </table>
             </div>
         </form>

         <nav class="navPhanTrang">
             <ul class="pagination">
                 <li></li>
             </ul>
         </nav>
     </div>

 @endsection
 @section('scriptCategory')
     <script>
         $(document).ready(function() {

             $('.form-check-input').on('click', function() {
                 var category_id = $(this).data('id'); //lấy cái value của id danh mục
                 var status = $(this).is(':checked') ? 1 : 0;
                 var label = $(this).siblings('label');
                 updateCategoryStatus(category_id, status, label);
             });
         })

         function updateCategoryStatus(category_id, status, label) {
             $.ajax({
                 url: '{{ route('categoryUpdateStatus', ':id') }}'.replace(':id', category_id),
                 type: 'put',
                 data: {
                     '_token': '{{ csrf_token() }}',
                     'status': status
                 },
                 success: function(response) {
                     console.log('Cập nhật trạng thái danh mục thành công');

                     if (status == 1) {
                         label.text('Bật');
                     } else {
                         label.text('Tắt');
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('Lỗi khi cập nhật trạng thái danh mục: ' + error);
                 }

             })
         }
     </script>

     <script>
         $(document).ready(function() {
             $('#filterFormCategory').on('submit', function() {
                 var formData = $(this).serialize();
                 //serialize: duyệt qua tất cả các phần tử đầu vào, chọn các phần tử input, select, và textarea trong biểu mẫu (form), và thu thập các giá trị của chúng.

                 $.ajax({
                     url: '{{ route('searchCategory') }}',
                     type: 'GET',
                     data: formData,
                     success: function(response) {
                         // Cập nhật bảng danh mục với kết quả lọc
                         $('.table-body').html(response.html);
                     },
                     error: function(error) {
                         console.error('Lỗi khi lọc danh mục' + error);
                     }
                 })
             })
         })
     </script>
 @endsection
