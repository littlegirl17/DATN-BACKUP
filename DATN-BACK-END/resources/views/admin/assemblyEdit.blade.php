@extends('admin.layout.layout')
@Section('title', 'Admin | Chỉnh sửa thông tin')
@Section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center  my-3">
            <h2 class="title-page ">
                Chỉnh sửa đơn hàng
            </h2>
            <a class="text-decoration-none text-light bg-31629e py-2 px-2" href="">Quay lại</a>
        </div>

        <form action="{{ route('editAssembly', $assembly->id) }}" class="formAdmin" method="post" class="mt-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="buttonProductForm">
                <div class=""></div>
                <div class="">
                    <button type="submit" class="btnFormAdd">
                        <p class="text m-0 p-0">Lưu</p>
                    </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 orderAdminTable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hình</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Trạng thái lắp ráp sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="trProduct">
                                <td class="d-flex justify-content-center border-0">
                                    <img src="{{ asset('img/' . $assembly->product->image) }}" alt=""
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $assembly->product->name }}</td>
                                <td>
                                    <input type="number" class="form-control    " value="" disabled>
                                </td>
                                <td>
                                    <div class="form-group ">
                                        <select class="form-select" aria-label="Default select example" name="status"
                                            id="" selected>
                                            @foreach ($statusAssembly as $key => $item)
                                                <option value="{{ $key }}"
                                                    {{ $assembly->status == $key ? 'selected' : '' }}>{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </form>
    </div>

@endsection
