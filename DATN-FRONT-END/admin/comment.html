<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Bình luận')
@Section('content') -->

<div class="container-fluid">

    <div class="searchAdmin">
        <form id="filterFormComment" action="{{ route('searchComment') }}" method="GET">
            <div class="row d-flex flex-row justify-content-between align-items-center">
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc bình luận theo sản phẩm</label>
                        <select class="form-select  rounded-0" aria-label="Default select example" name="filter_idsp">
                            <option value="">Tất cả</option>
                            <option value="">
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc người bình luận</label>
                        <input class="form-control rounded-0" name="filter_userName" placeholder="Nhập người bình luận"
                            type="text" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc nội dung bình luận</label>
                        <input class="form-control rounded-0" name="filter_content" placeholder="Nhập nội dung "
                            type="text" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Trạng thái</label>
                        <select class="form-select  rounded-0" aria-label="Default select example" name="filter_status">
                            <option value="">Tất cả</option>
                            <option value="1">Kích hoạt
                            </option>
                            <option value="0">Vô hiệu hóa
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-end">
                <button type="submit" class="btn borrder-0 rounded-0 text-light my-3 " style="background: #4099FF"><i
                        class="fa-solid fa-filter pe-2" style="color: #ffffff;"></i>Lọc bình luận</button>
            </div>
        </form>
    </div>

    <form id="submitFormAdmin">
        <div class="buttonProductForm mt-3">

            <button class="btn btnF2" type="button" onclick=""><i class="pe-2 fa-solid fa-trash"
                    style="color: #ffffff;"></i>Xóa nhiều
                bình luận</button>
        </div>

        <div class="border p-2 mt-3">
            <h4 class="my-2"><i class="pe-2 fa-solid fa-list"></i>Danh Sách Bình luận</h4>
            <table class="table table-bordered  pt-3">
                <thead class="table-header">
                    <tr class="">
                        <th class=" py-2"></th>
                        <th class=" py-2">Người bình luận</th>
                        <th class=" py-2">Sản phẩm</th>
                        <th class=" py-2">Nội dung</th>
                        <th class=" py-2">Trạng thái</th>
                        <th class=" py-2">Hành động</th>
                    </tr>
                </thead>

                <tbody class="table-body">
                    <tr class="">
                        <td>
                            <input class="" type="checkbox" name="comment_id[]" value="">
                            <p class=""></p>
                        </td>
                        <td class="nameAdmin">
                            <p></p>
                        </td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" data-id=""
                                    id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Bật</label>
                            </div>
                        </td>

                        <td class="m-0 p-0">
                            <div class="actionAdminProduct">
                                <div class="buttonProductForm m-0 py-3">
                                    <button class="btn btnF2"><a href="" class="text-decoration-none text-light "><i
                                                class="pe-2 fa-solid fa-trash" style="color: #ffffff;"></i>Xóa bình
                                            luận</a></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

    <nav class="navPhanTrang">
        <ul class="pagination">
            <li></li>
        </ul>
    </nav>
</div>


<!-- @endsection

@section('scriptComment')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('click', function() {
                // (this) tham chiếu đến phần tử html đó
                var comment_id = $(this).data(
                    'id'); //lấy ra id danh mục thông qua data-id="item->id"
                var status = $(this).is(':checked') ? 1 : 0; //is() trả về true nếu phần tử khớp với bộ chọn
                var label = $(this).siblings('label'); // Lấy label liền kề
                updateCommentStatus(comment_id, status, label);
            });

        })

        function updateCommentStatus(comment_id, status, label) {
            $.ajax({
                url: '{{ route('commentUpdateStatus', ':id') }}'.replace(':id', comment_id),
                type: 'PUT',
                data: {
                    '_token': '{{ csrf_token() }}', //Việc gửi mã token này cùng với mỗi request giúp xác thực rằng request đó được gửi từ ứng dụng của bạn, chứ không phải từ một nguồn khác.
                    'status': status
                },
                success: function(response) {
                    console.log('Cập nhật trạng thái thành công');

                    if (status == 1) {
                        label.text('Bật');
                    } else {
                        label.text('Tắt');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi cập nhật trạng thái sản phẩm: ' + error);
                }
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#filterFormComment').on('submit', function() {
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('searchComment') }}',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        $('.table-body').html(response.html);
                    },
                    error: function(error) {
                        console.error('Lỗi khi lọc' + error);
                    }
                })
            })
        })
    </script>
@endsection -->