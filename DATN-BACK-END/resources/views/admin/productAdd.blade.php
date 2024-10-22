 @extends('admin.layout.layout')
 @Section('title', 'Admin | Thêm sản phẩm')
 @Section('content')

     <div class="container-fluid">
         <h3 class="title-page ">
             Thêm sản phẩm
         </h3>

         <form action="{{ route('addFormProduct') }}" method="post" class="formAdmin" enctype="multipart/form-data">
             @csrf
             <div class="buttonProductForm">
                 <div class="">
                     @if ($errors->any())
                         @foreach ($errors->all() as $error)
                             <div id="alert-message" class="alertDanger">{{ $error }}</div>
                         @endforeach
                     @endif
                 </div>
                 <div class="">
                     <button type="submit" class="btnFormAdd">
                         <p class="text m-0 p-0">Lưu</p>
                     </button>
                 </div>
             </div>
             <ul class="nav nav-tabs " id="myTab" role="tablist">
                 <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                         type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Chung</button>
                 </li>
                 <li class="nav-item" role="presentation">
                     <button class="nav-link" id="discount-tab" data-bs-toggle="tab" data-bs-target="#discount-tab-pane"
                         type="button" role="tab" aria-controls="discount-tab-pane" aria-selected="false">Giảm
                         giá</button>
                 </li>
                 <li class="nav-item" role="presentation">
                     <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                         type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Hình
                         ảnh</button>
                 </li>

             </ul>
             <div class="tab-content" id="myTabContent">
                 <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                     tabindex="0">
                     <div class="form-group mt-3">
                         <label for="name" class="form-label">Tên sản phẩm</label>
                         <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" name="name"
                             placeholder="Nhập tên sản phẩm">
                     </div>
                     <div class="form-group mt-3">
                         <label for="slug" class="form-label">Slug</label>
                         <input type="text" class="form-control" id="convert_slug" name="slug"
                             placeholder="Nhập slug">
                     </div>
                     <div class="form-group mt-3">
                         <label for="description" class="form-label">Nội dung chi tiết sản phẩm</label>
                         <textarea class="form-control" id="description" name="description" placeholder="Mô tả sản phẩm" rows="3"></textarea>
                     </div>

                     <div class="form-group mt-3">
                         <label for="description" class="form-label">Chọn danh mục của sản phẩm</label>
                         <select class="form-select " name="category_id">
                             <option value="">Danh mục sản phâm</option>
                             @foreach ($categories as $category)
                                 <div class=""data-category-id="{{ $category->id }}">
                                     @foreach ($category->categories_children as $item)
                                         <option value="{{ $item->id }}" data-category-id="{{ $category->id }}">
                                             {{ $item->name }}
                                         </option>
                                     @endforeach
                                 </div>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group mt-3">
                         <label for="price" class="form-label">Giá sản phẩm</label>
                         <input type="number" class="form-control" id="price" name="price"
                             placeholder="Giá sản phẩm">
                     </div>
                     <div class="form-group mt-3">
                         <label for="price" class="form-label">Lượt xem</label>
                         <input type="number" class="form-control" id="view" name="view"
                             placeholder="Lượt xem của sản phẩm">
                     </div>
                     <div class="form-group mt-3">
                         <label for="price" class="form-label">Nổi bật</label>
                         <select class="form-select " aria-label="Default select example" name="outstanding">
                             <option>Chọn sản phẩm nổi bật</option>
                             <option value="0">Tắt</option>
                             <option value="1">Bật</option>
                         </select>
                     </div>

                     <div class="form-group mt-3">
                         <label for="price" class="form-label">Trạng thái</label>
                         <select class="form-select " aria-label="Default select example" name="status">
                             <option>Trạng thái sản phẩm</option>
                             <option value="0">Tắt</option>
                             <option value="1">Bật</option>
                         </select>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="discount-tab-pane" role="tabpanel" aria-labelledby="discount-tab"
                     tabindex="0">
                     <table class="table table-bordered pt-3">
                         <thead>
                             <tr>
                                 <th>Nhóm khách hàng</th>
                                 <th>Giá giảm sản phẩm</th>
                                 <th></th>
                             </tr>
                         </thead>
                         {{-- <tbody>
                        <tr>
                            <input type="hidden" name="user_group_id[{{ $item->id }}]" value="">
                            <td></td>
                            <td><input class="form-control" type="number" name="quantityUserGroup[{{ $item->id }}]">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="priceUserGroup[{{ $item->id }}]">
                            </td>
                        </tr>
                    </tbody>  --}}
                         <tbody class="discount-product">
                             <tr>
                                 <td>
                                     <select class="form-select" aria-label="Default select example"
                                         name="user_group_id[]">
                                         @foreach ($userGroups as $userGroup)
                                             <option value="{{ $userGroup->id }}">
                                                 {{ $userGroup->name }}</option>
                                         @endforeach
                                     </select>
                                 </td>
                                 <td><input class="form-control" type="number" name="priceUserGroup[]">
                                 </td>
                                 <td>
                                     <button type="button"
                                         class="remove_bannerImages_add remove-discount-btn">Xóa</button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                     <div class="row mb-3">
                         <div class="col-md-12">
                             <button type="button" class="btn btn-primary add-discount-btn">Thêm mức giảm
                                 giá</button>
                         </div>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                     tabindex="0">
                     <div class="form-group  mt-3">
                         <h4 class="label_admin">Ảnh sản phẩm</h4>

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
                         <h4>Hình ảnh bổ sung</h4>
                         <div class="row bannnerImagesEdit">
                             <div class="col-md-12 productImagePut">
                                 <div class="row_product my-3">
                                     <div class="custom-file imageAdd p-3">
                                         <div class="imageFile">
                                             <div class="previewImages"><img src="../img/lf.png" alt="">
                                             </div>
                                         </div>
                                         <div class="d-flex flex-column">
                                             <div class="">
                                                 <input type="file" name="images[]" class="inputFile imageInputJS">
                                             </div>
                                             <div class="mt-3">
                                                 <button class="remove_bannerImages_add remove_productImages">Xóa</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row mt-3  p-0">
                             <div class="col-md-3 col-12">
                                 <button type="button" class="  btn-ProductImagesAdd">Thêm hình
                                     ảnh</button>
                             </div>
                             <div class="col-md-9  col-12"></div>
                         </div>
                     </div>

                 </div>
             </div>
         </form>
     </div>

 @endsection
 @section('productEditAdminScript')
     <script>
         $(document).ready(function() {
             let discountRowTemplate = `
           <tr class="discount-row">
               <td>
                   <select class="form-select" aria-label="Default select example" name="user_group_id[]">
                       @foreach ($userGroups as $userGroup)
                           <option value="{{ $userGroup->id }}">{{ $userGroup->name }}</option>
                       @endforeach
                   </select>
               </td>
               <td>
                   <input class="form-control" type="number" name="priceUserGroup[]" >
               </td>
               <td>
                   <button type="button" class="remove_bannerImages_add remove-discount-btn">Xóa</button>
               </td>
           </tr>
       `;

             $('.add-discount-btn').click(function() {
                 $('.discount-product').append(discountRowTemplate.trim());
             });

             $(document).on('click', '.remove-discount-btn', function() {
                 $(this).closest('.discount-row').remove();
             });
         });
     </script>
 @endsection
