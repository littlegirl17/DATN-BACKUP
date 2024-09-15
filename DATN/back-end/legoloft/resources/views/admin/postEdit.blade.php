<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Sửa danh mục')
@Section('content') -->


<div class="container-fluid">
    <h3 class="title-page ">
        Chỉnh sửa bài viết
    </h3>
    <form action="{{ route('postUpdate', $post->id) }}" method="post" class="formAdmin" enctype="multipart/form-data">
        <div class="buttonProductForm ">
            <button class="btn btnF3">
                Lưu
            </button>
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <select name="" id="" class="form-select mt-3">
                <option value="">1</option>
                <option value="">1</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Mô tả</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputFile" class="label_admin">Ảnh bài viết
                <div class="custom-file">
                    <input type="file" name="image" id="HinhAnh">
                    <img src="" alt="" style="width:80px; height:80px; object-fit:cover;">
                </div>
            </label>
        </div>
        <select class="form-select mt-3" aria-label="Default select example" name="status">
            <option value="0">Tắt</option>
            <option value="1">Bật</option>
        </select>

    </form>

</div>

<!-- @endsection -->