@extends('layout.layout')
@section('title', 'Đơn hàng')
@section('content')
    <!-- START MAIN -->
    <div class="container_order">
        <div class="order_main">
            <div class="row px-3">
                <div class="" style="border-bottom: 0.5px solid #e8e8e8">
                    <h3>Order ID: #LEGO3746493</h3>
                    <p>Order date: 23/08/2024 - 12:36</p>
                </div>
            </div>
            <div class="row mt-3 px-3">
                <h4>Thông tin đặt hàng</h4>
                <div class="" style="border-bottom: 0.5px solid #e8e8e8">
                    <div class="px-4">
                        <p>Người đặt: Huỳnh Kha</p>
                        <p>SĐT: 0353123771</p>
                        <p>Địa chỉ: Thiện Chánh 2, Tam Quan Bắc, Hoài Nhơn, Bình Định</p>
                        <p>Phương thức thanh toán: Chuyển khoản MoMo</p>
                        <p>
                            Tổng tiền:
                            <strong>1.000.000đ</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3 m-0">
                <h4>Sản phẩm đã đặt</h4>
                <div class="" style="border-bottom: 0.5px solid #e8e8e8">
                    <table class="table table_order_product">
                        <tbody>
                            <tr class="">
                                <td class="m-0 td_order_name" style="border-style: unset">
                                    <div class="d-flex">
                                        <div class="table_order_product_img">
                                            <img src="img/city-product-1.webp" class="" alt="" />
                                        </div>
                                        <p class="name_order_desktop">Lego Thành Phố</p>

                                        <div class="order_content_product_mobile">
                                            <p class="">Lego Thành Phố</p>
                                            <div class="product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                            <p class="quantity_order_mobile">số lượng 2</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="right_order_price px-4 m-0" style="border-style: unset">
                                    <div class="product_box_price">
                                        <span>100.000đ</span>90.000đ
                                    </div>
                                    <p>số lượng 2</p>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="m-0 td_order_name" style="border-style: unset">
                                    <div class="d-flex">
                                        <div class="table_order_product_img">
                                            <img src="img/city-product-1.webp" class="" alt="" />
                                        </div>
                                        <p class="name_order_desktop">Lego Thành Phố</p>

                                        <div class="order_content_product_mobile">
                                            <p class="">Lego Thành Phố</p>
                                            <div class="product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                            <p class="quantity_order_mobile">số lượng 2</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="right_order_price px-4 m-0" style="border-style: unset">
                                    <div class="product_box_price">
                                        <span>100.000đ</span>90.000đ
                                    </div>
                                    <p>số lượng 2</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8"></div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="/" class="btn_checkout">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->
@endsection
