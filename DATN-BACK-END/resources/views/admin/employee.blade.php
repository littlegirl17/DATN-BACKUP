@extends('admin.layout.layout')
@Section('title', 'Admin | Nhân viên')
@Section('content')
    <div class="container-fluid">
        <form id="submitFormAdmin">
            <div class="buttonProductForm mt-3">
                <div class=""></div>
                <div class=""></div>
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
                                    <input class="" type="checkbox" name="employee_id[]" value="">
                                    <p class=""></p>
                                </td>
                                <td class="nameAdmin">
                                    <p>{{ $item->fullname }}</p>
                                </td>
                                <td class="">{{ $item->email }}</td>
                                <td></td>
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
