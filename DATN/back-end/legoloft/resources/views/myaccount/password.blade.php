@extends('myaccount.layout.layout')
@section('title', 'Quên mật khẩu')
@section('content_myaccount')
    <div class="container">
        <div class="layout_member">
            <div class="layout_member_left">
                @include('myaccount.menuLeftAccount')
            </div>
            <div class="layout_member_right">
                <form action="">
                    <div class="">
                        <div class="layout_member_right_title">
                            <h2>Thay đổi mật khẩu</h2>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control-input-pw" name="" value="" />
                            </div>
                            <div class="form-group pt-3">
                                <label for="">Xác nhận lại mật khẩu</label>
                                <input type="password" class="form-control-input-pw" name="" value="" />
                            </div>
                            <div class="btn_row">
                                <button class="btn_checkout">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
