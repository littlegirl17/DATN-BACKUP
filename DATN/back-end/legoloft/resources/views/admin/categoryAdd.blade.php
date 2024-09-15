<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Thêm danh mục')
@Section('content') -->

<div class="container-fluid">

    <h3 class="title-page ">
        Thêm danh mục
    </h3>
    <div class="formAdminAlert">
        <div class="alert alert-danger py-2"></div>
    </div>

    <form action="/admin/add-category" method="post" class="formAdmin" enctype="multipart/form-data">
        <button class="btnFormAdd ">
            Lưu
        </button>

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
            <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
            <div class="custom-file">
                <input type="file" name="image" id="HinhAnh">
                <div id="preview"></div>
            </div>

        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Thứ tự xuất hiện</label>
            <input type="number" class="form-control" name="sort_order" id="" aria-describedby="" placeholder="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Trạng thái</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected>Trang thái</option>
                <option value="1">Kích hoạt</option>
                <option value="0">Vô hiệu hóa</option>
            </select>
        </div>
    </form>
</div>

<!-- @endsection -->