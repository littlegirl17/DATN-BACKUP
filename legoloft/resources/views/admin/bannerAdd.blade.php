<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Thêm banner')
@Section('content') -->

<div class="container-fluid">

    <h3 class="title-page ">
        Thêm banner
    </h3>

    <div class="formAdminAlert">
        <div class="alert alert-danger py-2"></div>
    </div>

    <form action="/admin/add-banner" method="post" class="formAdmin" enctype="multipart/form-data">
        <div class="buttonProductForm ">
            <button class="btn btnF3">
                Lưu
            </button>
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tên banner</label>
            <input type="text" class="form-control" name="name" aria-describedby="title"
                placeholder="Nhập banner bài viết">
        </div>
        <div class="form-group mt-3">
            <label for="position" class="form-label">Vị trí banner xuất hiện trên trang web</label>
            <select class="form-select" name="position">
                <option value="">
                </option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="title" class="form-label">Trạng thái</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected>Trang thái</option>
                <option value="1">Kích hoạt</option>
                <option value="0">Vô hiệu hóa</option>
            </select>
        </div>
        <div class="row mt-5">
            <h4 class="title-page ">
                Thông tin chi tiết banner </h4>
        </div>

        <div class="row bannnerImagesEdit">
            <div class="col-md-12 bannerImagePUT">
                <div class="row banner_row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <label for="exampleInputFile" class="form-label">Ảnh banner</label>
                        <div class="custom-file">
                            <input type="file" name="image[]" id="HinhAnh" multiple>
                            <div id="preview"></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" aria-describedby="title"
                            placeholder="Nhập tiêu đề hình ảnh ">
                    </div>
                    <div class="col-md-2 col-sm-12 col-12">
                        <label for="title" class="form-label">Thứ tự xuất hiện</label>
                        <input type="number" class="form-control" name="sort_order" id=""
                            aria-describedby="" placeholder="">
                    </div>
                    <div class="col-md-1 col-sm-12 col-12">
                        <button class="btn btn-danger remove_bannerImages_add" href="">Xóa</button>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <button type="button" class="btn btn-primary  add-bannerImage">Thêm hình ảnh</button>
            </div>
        </div>
    </form>
</div>

<!-- @endsection

@section('addBannerAdmin')
    <script>
        $(document).ready(function() {
            let imageBannerTemplate = `                    <div class="row banner_row">

<div class="col-md-6 col-sm-12 col-12">
                            <label for="exampleInputFile" class="form-label">Ảnh banner</label>
                            <div class="custom-file">
                                <input type="file" name="image[]" id="HinhAnh" multiple>
                                <div id="preview"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-12">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" aria-describedby="title"
                                placeholder="Nhập tiêu đề hình ảnh ">
                        </div>
                        <div class="col-md-2 col-sm-12 col-12">
                            <label for="title" class="form-label">Thứ tự xuất hiện</label>
                            <input type="number" class="form-control" name="sort_order" id="" aria-describedby=""
                                placeholder="">
                        </div>
                        <div class="col-md-1 col-sm-12 col-12">
                            <button class="btn btn-danger remove_bannerImages_add" >Xóa</button>
                        </div>                        </div>

`;

            $('.add-bannerImage').click(function() {
                $('.bannerImagePUT').append(imageBannerTemplate.trim());
            });

            $(document).on('click', '.remove_bannerImages_add', function() {
                $(this).closest('.banner_row').remove();
            });
        });
    </script>
@endsection -->
