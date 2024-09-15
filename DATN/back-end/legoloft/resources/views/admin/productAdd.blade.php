<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Thêm sản phẩm')
@Section('content') -->

<div class="container-fluid">

    <h3 class="title-page ">
        Thêm sản phẩm
    </h3>

    <form action="/admin/add-product" method="post" class="formAdmin" enctype="multipart/form-data">
        <button class="btnFormAdd ">
            Lưu
        </button>

        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
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
                    <input type="text" class="form-control" id="convert_slug" name="slug" placeholder="Nhập slug">
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="form-label">Nội dung chi tiết sản phẩm</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Mô tả sản phẩm"
                        rows="3"></textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="description" class="form-label">Chọn danh mục của sản phẩm</label>
                    <select class="form-select " name="category_id">
                        <option value="">Danh mục sản phâm</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="price" class="form-label">Giá sản phẩm</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Giá sản phẩm">
                </div>
                <div class="form-group mt-3">
                    <label for="price" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        placeholder="Số lượng sản phẩm">
                </div>
                <div class="form-group mt-3">
                    <label for="price" class="form-label">Lượt xem</label>
                    <input type="number" class="form-control" id="view" name="view" placeholder="Lượt xem của sản phẩm">
                </div>
                <div class="form-group mt-3">
                    <label for="">Nổi bật</label>
                    <select class="form-select mt-3" aria-label="Default select example" name="outstanding">
                        <option>Chọn sản phẩm nổi bật</option>
                        <option value="0">Tắt</option>
                        <option value="1">Bật</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="">Trạng thái</label>
                    <select class="form-select mt-3" aria-label="Default select example" name="status">
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
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input type="hidden" name="user_group_id[{{ $item->id }}]" value="">
                            <td></td>
                            <td><input class="form-control" type="number" name="quantityUserGroup[{{ $item->id }}]">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="priceUserGroup[{{ $item->id }}]">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="form-group mt-3">
                    <label for="exampleInputFile" class="label_admin">Ảnh sản phẩm</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="HinhAnh">
                        <div id="preview"></div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="exampleInputFile" class="label_admin">Ảnh sản phẩm</label>
                    <div class="custom-file">
                        <input type="file" id="HinhAnh" name="images[]" multiple>
                        <div id="preview"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- @endsection -->