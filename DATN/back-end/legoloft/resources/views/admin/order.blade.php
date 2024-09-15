<!-- @extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Đơn hàng')
@Section('content') -->

<div class="container-fluid">


    <div class="searchAdmin">
        <form id="filterFormOrder" action="{{ route('searchOrder') }}" method="GET">
            <div class="row d-flex flex-row justify-content-between align-items-center">
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc theo id đơn hàng</label>
                        <input class="form-control rounded-0" name="filter_iddh" placeholder="Nhập id đơn hàng"
                            type="number" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc theo tên khách hàng</label>
                        <input class="form-control rounded-0" name="filter_userName" placeholder="Nhập tên khách hàng"
                            type="text" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Tình trạng đơn hàng</label>
                        <select class="form-select  rounded-0" aria-label="Default select example" name="filter_status">
                            <option value="">Tất cả</option>
                            <option value="">

                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Lọc tổng tiền</label>
                        <input class="form-control rounded-0" name="filter_total" placeholder="Nhập tổng tiền"
                            type="number">
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end align-items-end">
                <button type="submit" class="btn borrder-0 rounded-0 text-light my-3 " style="background: #4099FF"><i
                        class="fa-solid fa-filter pe-2" style="color: #ffffff;"></i>Lọc sản phẩm
                </button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-sm-12 btnOrderAdmin">
            <a href="{{ route('admin.order', ['status_id' => 'all']) }}" class="btn btn-success rounded-0 border-0"
                style="background-color: #F38773">Tất cả</a>
            <a href="{{ route('admin.order', ['status_id' => 1]) }}" class="btn btn-success rounded-0  border-0"
                style="background-color: #00bcd4">Mới </a>
            <a href="{{ route('admin.order', ['status_id' => 2]) }}" class="btn btn-success rounded-0  border-0"
                style="background-color: #FFB356">Đang xử lý </a>
            <a href="{{ route('admin.order', ['status_id' => 3]) }}" class="btn btn-success rounded-0  border-0"
                style="background-color: #188DD1">Đã giao hàng </a>
            <a href="{{ route('admin.order', ['status_id' => 4]) }}" class="btn btn-success rounded-0  border-0"
                style="background-color: #07884B">Hoàn thành </a>
            <a href="{{ route('admin.order', ['status_id' => 5]) }}" class="btn btn-success rounded-0  border-0"
                style="background-color: #FF0000">Hủy đơn hàng </a>

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered pt-3 mt-3">
            <thead class="table-header">
                <tr class="">
                    <th class="py-2">IDDH</th>
                    <th class="py-2">Khách hàng</th>
                    <th class="py-2">Chi tiết sản phẩm</th>
                    <th class="py-2">Tổng cộng</th>
                    <th class="py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr class="orderAdminTr" style="background: #fff">
                    <td class=""></td>
                    <td class=" d-flex flex-column p-0 m-0">
                        <div class="text-start m-0">
                            <p class="m-0 p-0">Điện thoại: <span></span></p>
                            <p class="m-0 p-0">Tên KH: <strong></strong></p>
                        </div>
                        <div class="m-0 p-0 text-start">
                            <p class="m-0 p-0">Địa chỉ:</p>
                        </div>

                    </td>
                    <td class="">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Hình</th>
                                        <th>SP</th>
                                        <th>Giá</th>
                                        <th>SL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>
                                            <img src="" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td class="nameAdmin">
                                            <p></p>
                                        </td>
                                        <th>đ</th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td class="">
                        <h6>đ</h6>
                    </td>
                    <td class="actionAdmin">
                        <a href="{{ route('admin.orderEdit', $item->id) }}" class="text-decoration-none px-2"><img
                                src="https://img.icons8.com/sf-black-filled/64/1f508d/create-new.png" alt="create-new"
                                style="width:35px;height:35px; object-fit:cover;" /></a>
                        <a href="" class="text-decoration-none "><i class="fa-solid fa-trash"
                                style="color: #ff0505; font-size: 25px;  "></i></a>
                    </td>

                </tr>
            </tbody>

        </table>

    </div>
</div>

<!-- @endsection

@section('scriptOrder')
    <script>
        $(document).ready(function() {
            $('#filterFormOrder').on('submit', function() {
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('searchOrder') }}',
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