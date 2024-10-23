@extends('admin.layout.layout')
@Section('title', 'Admin | Nhân viên')
@Section('content')
    <div class="container-fluid">

        <div class="searchAdmin">
            <form id="filterFormEmployee" action="{{ route('searchEmployee') }}" method="POST">
                @csrf
                <div class="row d-flex flex-row justify-content-between align-items-center">
                    <div class="col-sm-4">
                        <div class="form-group mt-3">
                            <label for="title" class="form-label">Họ tên </label>
                            <input class="form-control rounded-0" name="filter_fullname" placeholder="Họ và tên nhân viên"
                                type="text" value="{{ $filter_fullname ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mt-3">
                            <label for="title" class="form-label">Tên đăng nhập </label>
                            <input class="form-control rounded-0" name="filter_username"
                                placeholder="Tên đăng nhập nhân viên" type="text" value="{{ $filter_username ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
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
                            class="fa-solid fa-filter pe-2" style="color: #ffffff;"></i>Lọc khách hàng
                    </button>
                </div>
            </form>
        </div>


        <form id="submitFormAdmin" onsubmit="event.preventDefault();">
            @csrf

            <div class="buttonProductForm mt-3">
                <div class="m-0 p-0">
                    @if (session('error'))
                        <div id="alert-message" class="alertDanger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div id="alert-message" class="alertSuccess">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="m-0 p-0">
                    <button type="button" class="btn btnF1" onclick="window.location.href='{{ route('employeeAdd') }}'">
                        <i class="pe-2 fa-solid fa-plus" style="color: #ffffff;"></i>Thêm nhân viên
                    </button>

                    <button class="btn btnF2" type="button" onclick="submitForm('{{ route('deleteEmployee') }}','post')"><i
                            class="pe-2 fa-solid fa-trash" style="color: #ffffff;"></i>Xóa
                        nhân viên</button>
                </div>
            </div>
            <div class="border p-2 mt-3">
                <h4 class="my-2"><i class="pe-2 fa-solid fa-list"></i>Danh Sách nhân viên</h4>
                <table class="table table-bordered  pt-3">
                    <thead class="table-header">
                        <tr class="">
                            <th class=" py-2"></th>
                            <th class=" py-2">Nhân viên lắp ráp</th>
                            <th class=" py-2">Email</th>
                            <th class=" py-2">Trạng thái</th>
                            <th class=" py-2">Hành động</th>
                        </tr>
                    </thead>

                    <tbody class="table-body">
                        @foreach ($employees as $item)
                            <tr class="">
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="checkbox" id="cbx_{{ $item->id }}" class="hidden-xs-up"
                                            name="employee_id[]" value="{{ $item->id }}">
                                        <label for="cbx_{{ $item->id }}" class="cbx"></label>
                                    </div>
                                </td>
                                <td class="nameAdmin">
                                    <p>{{ $item->fullname }}</p>
                                </td>
                                <td class="">{{ $item->email }}</td>
                                <td class="">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            data-id="{{ $item->id }}" id="flexSwitchCheckChecked"
                                            {{ $item->status == 1 ? 'checked' : 0 }}>
                                        <label class="form-check-label"
                                            for="flexSwitchCheckChecked">{{ $item->status == 1 ? 'Kích hoạt' : 'Vô hiệu hóa' }}</label>
                                    </div>
                                </td>
                                <td class="m-0 p-0">
                                    <div class="actionAdminProduct">
                                        <div class="buttonProductForm m-0 py-3">
                                            <button type="button" class="btnActionProductAdmin2"><a
                                                    href="{{ route('editEmployee', $item->id) }}"
                                                    class="text-decoration-none text-light"><i class="pe-2 fa-solid fa-pen"
                                                        style="color: #ffffff;"></i>Chỉnh sửa</a></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </form>
    </div>

@endsection
@section('employeeAdminScript')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('click', function() {
                // (this) tham chiếu đến phần tử html đó
                var employee_id = $(this).data('id'); //lấy ra id danh mục thông qua data-id="item->id"
                var status = $(this).is(':checked') ? 1 : 0; //is() trả về true nếu phần tử khớp với bộ chọn
                var label = $(this).siblings('label'); // Lấy label liền kề
                updateEmployeeStatus(employee_id, status, label);
            })
        })

        function updateEmployeeStatus(employee_id, status, label) {
            $.ajax({
                url: '{{ route('employeeUpdateStatus', ':id') }}'.replace(':id', employee_id),
                type: 'PUT',
                data: {
                    '_token': '{{ csrf_token() }}', //Việc gửi mã token này cùng với mỗi request giúp xác thực rằng request đó được gửi từ ứng dụng của bạn, chứ không phải từ một nguồn khác.
                    'status': status
                },
                success: function(response) {
                    if (response.success) {
                        label.text(status == 1 ? 'Kích hoạt' : 'Vô hiệu hóa');
                    }
                },
                error: function(error) {
                    console.error('Lỗi khi cập nhật trạng thái nhân viên: ' + error);
                }
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#filterFormEmployee').on('submit', function() {
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('searchEmployee') }}',
                    type: 'POST',
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
@endsection
