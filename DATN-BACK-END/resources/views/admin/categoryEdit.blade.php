<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Sửa danh mục')
@Section('content') -->

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center  my-3">
        <h3 class="title-page ">
            Chỉnh sửa danh mục
        </h3>
        <a class="text-decoration-none text-light bg-31629e py-2 px-2" href="">Quay
            lại</a>
    </div>

    <form action="{{ route('categoryUpdate', $category->id) }}" method="post" class="formAdmin"
        enctype="multipart/form-data">
        <div class="buttonProductForm ">
            <button class="btn btnF3">
                Lưu
            </button>
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" name="name"
                value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Slug</label>
            <input type="text" class="form-control" id="convert_slug" name="slug"
                value="">
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputFile" class="form-label">Ảnh danh mục</label>
            <div class="custom-file">
                <input type="file" name="image" id="HinhAnh">
                <img src="" alt=""
                    style="width:80px; height:80px; object-fit:cover;">
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Thứ tự xuất hiện</label>
            <input type="text" class="form-control" name="sort_order" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Trạng thái</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="0" >Tắt</option>
                <option value="1" >Bật</option>
            </select>
        </div>
    </form>
</div>

<!-- @endsection -->
