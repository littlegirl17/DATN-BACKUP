<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Thành viên')
@Section('content') -->

<div class="container-fluid">
    <div class="searchAdmin">
        <form id="filterFormProduct" action="{{ route('searchUser') }}" method="GET">
            <div class="row d-flex flex-row justify-content-between align-items-center">
                <div class="col-sm-6">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc theo email khách hàng</label>
                        <input class="form-control rounded-0" name="filter_email"
                            placeholder="Email khách hàng" type="text" value="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Trạng thái</label>
                        <select class="form-select  rounded-0" aria-label="Default select example"
                            name="filter_status">
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
                <button type="submit" class="btn borrder-0 rounded-0 text-light my-3 "
                    style="background: #4099FF"><i class="fa-solid fa-filter pe-2"
                        style="color: #ffffff;"></i>Lọc khách hàng
                </button>
            </div>
        </form>
    </div>

    <form id="submitFormAdmin">
        <div class="buttonProductForm mt-3">
            <button class="btn btnF1">
                <a href="" class="text-decoration-none text-light"><i class="pe-2 fa-solid fa-plus"
                        style="color: #ffffff;"></i>Tạo mới khách hàng</a>
            </button>
            <button class="btn btnF2" type="button" onclick=""><i class="pe-2 fa-solid fa-trash"
                    style="color: #ffffff;"></i>Xóa
                khách hàng</button>
        </div>
        <div class="border p-2">
            <h4 class="my-2"><i class="pe-2 fa-solid fa-list"></i>Danh Sách Khách Hàng</h4>
            <table class="table table-bordered pt-3">
                <thead class="table-header">
                    <tr>
                        <th class="py-2">Image</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Nhóm khách hàng</th>
                        <th class="py-2">Trạng thái</th>
                        <th class="py-2">Hành động</th>

                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr class="">
                        <td class=""><img src="" alt=""
                                style="width: 80px; height: 80px; object-fit: cover;"></td>
                        <td class=""></td>
                        <td></td>

                        <td class="">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    data-id="{{ $item->id }}" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Bật</label>
                            </div>
                        </td>
                        <td class="m-0 p-0">
                            <div class="actionAdminProduct m-0 py-3">
                                <button class="btnActionProductAdmin2"><a href=""
                                        class="text-decoration-none text-light"><i
                                            class="pe-2 fa-solid fa-pen" style="color: #ffffff;"></i>Chỉnh
                                        sửa tài khoản</a></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

<!-- @endsection
@section('scriptUser')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('click', function() {
                // (this) tham chiếu đến phần tử html đó
                var user_id = $(this).data(
                    'id'); //lấy ra id danh mục thông qua data-id="item->id"
                var status = $(this).is(':checked') ? 1 : 0; //is() trả về true nếu phần tử khớp với bộ chọn
                var label = $(this).siblings('label'); // Lấy label liền kề
                updateUserStatus(user_id, status, label);
            });

        })

        function updateUserStatus(user_id, status, label) {
            $.ajax({
                url: '{{ route('userUpdateStatus', ':id') }}'.replace(':id', user_id),
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
            $('#filterFormUser').on('submit', function() {
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('searchUser') }}',
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