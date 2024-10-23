 @extends('admin.layout.layout')
 @Section('title', 'Admin| Sửa nhân viên')
 @Section('content')

     <div class="container-fluid">

         <h3 class="title-page ">
             Chỉnh sửa thông tin nhân viên
         </h3>
         <form action="{{ route('editEmployee', $employee->id) }}" method="post" class="formAdmin"
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

             <div class="row">
                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Họ tên</label>
                     <input type="text" class="form-control" id="" name="fullname"
                         value="{{ $employee->fullname }}">
                 </div>
                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Tên đăng nhập</label>
                     <input type="text" class="form-control" id="" name="username"
                         value="{{ $employee->username }}">
                 </div>
                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email"
                         value="{{ $employee->email }}">
                 </div>
                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Số điện thoại</label>
                     <input type="phone" class="form-control" id="phone" name="phone"
                         value="{{ $employee->phone }}">
                 </div>
                 <div class="form-group mt-3">
                     <label for="description" class="form-label">Nhóm người dùng</label>
                     <select class="form-select " name="admin_group_id">
                         @foreach ($administrationGroup as $item)
                             <option value="{{ $item->id }}"
                                 {{ $item->id == $employee->admin_group_id ? 'selected' : '' }}>{{ $item->name }}
                             </option>
                         @endforeach
                     </select>
                 </div>

                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Image</label>
                     <div class="custom-file">
                         <input type="file" name="image" id="HinhAnh">
                         @if ($employee->image)
                             <img src="{{ asset('img/' . $employee->image) }}" alt=""
                                 style="width:80px; height:80px; object-fit:cover;">
                         @endif
                     </div>
                 </div>

                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Mật khẩu</label>
                     <input type="password" class="form-control" id="password" name="password">
                 </div>
                 <div class="form-group mt-3">
                     <label for="" class="form-label">Xác nhận mật khẩu </label>
                     <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                 </div>

                 <div class="form-group mt-3">
                     <label for="title" class="form-label">Trạng thái</label>
                     <select class="form-select " name="status">
                         <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                         <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Kích hoạt</option>
                     </select>
                 </div>
             </div>
         </form>
     </div>

 @endsection