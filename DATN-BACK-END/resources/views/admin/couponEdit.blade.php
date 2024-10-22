<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Sửa danh mục')
@Section('content') -->

<div class="container-fluid">

    <h3 class="title-page ">
        Chỉnh sửa phiếu giảm giá
    </h3>
    <form action="{{ route('admin.couponUpdate', $coupon->id) }}" method="post" class="formAdmin">
        <div class="buttonProductForm ">
            <button class="btn btnF3">
                Lưu
            </button>
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tên phiếu giảm giá</label>
            <input type="text" class="form-control" name="name_coupon" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Mã(code)</label>
            <input type="number" class="form-control" name="code" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Loại(type)</label>
            <select class="form-select mt-3" aria-label="Default select example" name="type">
                <option value="0">Giảm theo %</option>
                <option value="1">Số tiền cố định</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" name="discount" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Tổng cộng</label>
            <input type="number" class="form-control" name="total" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="date_start" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" name="date_end" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Trạng thái</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="0">Tắt</option>
                <option value="1">Bật</option>
            </select>
        </div>
    </form>
</div>

<!-- @endsection -->