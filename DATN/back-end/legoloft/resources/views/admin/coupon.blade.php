<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Danh mục')
@Section('content') -->

<div class="container-fluid">

    <div class="searchAdmin">
        <form id="filterFormCoupon" action="{{ route('searchCoupon') }}" method="GET">
            <div class="row d-flex flex-row justify-content-between align-items-center">
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Tên mã giảm giá</label>
                        <input class="form-control rounded-0" name="filter_name" placeholder="Tên mã giảm giá"
                            type="text" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc theo mã code</label>
                        <input class="form-control rounded-0" name="filter_code" placeholder="Mã code" type="number"
                            value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc theo tổng giảm</label>
                        <input class="form-control rounded-0" name="filter_total" placeholder="Tổng số tiền giảm"
                            type="number" value="">
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
                        class="fa-solid fa-filter pe-2" style="color: #ffffff;"></i>Lọc mã giảm giá</button>
            </div>
        </form>
    </div>

    <form id="submitFormAdmin">
        <div class="buttonProductForm mt-3">
            <button class="btn btnF1">
                <a href="" class="text-decoration-none text-light"><i class="pe-2 fa-solid fa-plus"
                        style="color: #ffffff;"></i>Tạo mới mã giảm</a>
            </button>
            <button class="btn btnF2" type="button" onclick=""><i class="pe-2 fa-solid fa-trash"
                    style="color: #ffffff;"></i>Xóa
                mã giảm</button>

        </div>
        <div class="border p-2">
            <h4 class="my-2"><i class="pe-2 fa-solid fa-list"></i>Danh Sách Mã Giảm Giá</h4>
            <table class="table table-bordered pt-3">
                <thead class="table-header">
                    <tr>
                        <th class=" py-2"></th>
                        <th class="header__item py-2">Tên phiếu giảm giá</th>
                        <th class="header__item py-2">Mã</th>
                        <th class="header__item py-2">Giảm giá</th>
                        <th class="header__item py-2">Trạng thái</th>
                        <th class="header__item py-2">Hành động</th>
                    </tr>

                </thead>
                <tbody class="table-body">
                    <tr class="">
                        <td class="text-center" style="width:20px">
                            <input class="" type="checkbox" name="coupon_id[]" value="">
                            <p class=""></p>
                        </td>
                        <td class="nameAdmin">
                            <p></p>
                        </td>
                        <td class=""></td>
                        <td class="">

                        </td>

                        <td class="">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" data-id="{{ $item->id }}"
                                    id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Bật</label>
                            </div>
                        </td>
                        <td class="m-0 p-0">
                            <div class="actionAdminProduct m-0 py-3">
                                <button class="btnActionProductAdmin2"><a href=""
                                        class="text-decoration-none text-light"><i class="pe-2 fa-solid fa-pen"
                                            style="color: #ffffff;"></i>Sửa lại
                                        mã giảm</a></button>
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
@section('scriptCoupon')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('click', function() {
                // (this) tham chiếu đến phần tử html đó
                var coupon_id = $(this).data(
                    'id'); //lấy ra id danh mục thông qua data-id="item->id"
                var status = $(this).is(':checked') ? 1 : 0; //is() trả về true nếu phần tử khớp với bộ chọn
                var label = $(this).siblings('label'); // Lấy label liền kề
                updateCouponStatus(coupon_id, status, label);
            });

        })

        function updateCouponStatus(coupon_id, status, label) {
            $.ajax({
                url: '{{ route('couponUpdateStatus', ':id') }}'.replace(':id', coupon_id),
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
            $('#filterFormCoupon').on('submit', function() {
                var formData = $(this).serialize();

                $.ajax(
                    url: '{{ route('searchCoupon') }}',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        $('.table-body').html(response.html)
                    },
                    error: function(error) {
                        console.error('Lỗi khi lọc' + error);
                    }
                )
            })
        })
    </script>
@endsection -->