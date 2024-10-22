<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Thêm danh mục')
@Section('content') -->

<div class="container-fluid">

    <h3 class="title-page ">
        Thêm phiếu giảm giá
    </h3>
    <form action="/admin/add-coupon" method="post" class="formAdmin" enctype="multipart/form-data">
        <button class="btnFormAdd ">
            Lưu
        </button>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tên phiếu giảm giá</label>
            <input type="text" class="form-control" name="name_coupon" placeholder="Nhập tên phiếu giảm giá">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Mã(code)</label>
            <input type="text" class="form-control" name="code" placeholder="Nhập code">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Loại(type)</label>
            <select class="form-select mt-3" aria-label="Default select example" name="type">
                <option value="0">Giảm Giá theo %</option>
                <option value="1">Số tiền cố định</option>
            </select>

        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Giảm giá</label>
            <input type="text" class="form-control" name="discount" placeholder="Nhập giá giảm">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Tổng cộng</label>
            <input type="text" class="form-control" name="total" placeholder="Tổng cộng">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="date_start" placeholder="Ngày bắt đầu">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" name="date_end" placeholder="Ngày kết thúc">
        </div>
        <select class="form-select mt-3" aria-label="Default select example" name="status">
            <option selected>Trang thái</option>
            <option value="1">Kích hoạt</option>
            <option value="0">Vô hiệu hóa</option>
        </select>
    </form>
</div>


<!-- @endsection -->