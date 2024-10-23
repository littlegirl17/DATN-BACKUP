@extends('admin.layout.layout')
@Section('title', 'Admin | Thêm thành viên')
@Section('content')

    <div class="container-fluid">

        <h3 class="title-page ">
            Thêm thành viên
        </h3>

        <form action="{{ route('employeeAddForm') }}" method="post" class="formAdmin" enctype="multipart/form-data">
            @csrf
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
                    <label for="title" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="" name="fullname" value="">
                </div>
                <div class="form-group mt-3">
                    <label for="title" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="" name="username" value="">
                </div>
                <div class="form-group mt-3">
                    <label for="title" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                </div>
                <div class="form-group mt-3">
                    <label for="title" class="form-label">Số điện thoại</label>
                    <input type="phone" class="form-control" id="phone" name="phone" value="">
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="form-label">Nhóm người dùng</label>
                    <select class="form-select " name="admin_group_id">
                        @foreach ($administrationGroup as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="title" class="form-label">Thêm hình ảnh nhân viên</label>
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
                        <option value="0">Vô hiệu hóa</option>
                        <option value="1">Kích hoạt</option>
                    </select>
                </div>
            </div>

        </form>
    </div>




@endsection
