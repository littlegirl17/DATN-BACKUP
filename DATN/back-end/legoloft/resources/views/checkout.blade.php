@extends('layout.layout')
@section('title', 'Thanh toán')
@section('content')
    <!-- START MAIN -->
    <div class="container_checkout">
        <div class="container">
            <div class="checkout_main">
                <div class="checkout_main_left">
                    <div class="checkout_header_left_one"></div>
                    <div class="checkout_main_left_one">
                        <div class="check_left_title">
                            <h2>Thông tin vận chuyển</h2>
                        </div>
                        <div class="checkout_main_left_one_item">
                            <div class="checkout_left_one_input">
                                <label for="">Tên</label>
                                <input type="text" class="input_checkout" id="" placeholder="Nhập tên"
                                    name="name" value="" />
                            </div>
                            <div class="checkout_left_one_input">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="input_checkout" id="" placeholder="Nhập số điện thoại"
                                    name="name" value="" />
                            </div>
                        </div>
                        <div class="">
                            <div class="checkout_left_one_input">
                                <label for="">Email</label>
                                <input type="text" class="input_checkout" id="" placeholder="Nhập email"
                                    name="name" value="" />
                            </div>
                        </div>
                        <div class="checkout_main_left_one_item_2">
                            <div class="checkout_left_one_input">
                                <label for="">Tỉnh</label>
                                <select class="select_checkout" aria-label="Default select example" name="province"
                                    id="province">
                                    <option selected disabled>Tỉnh/Thành phố</option>
                                </select>
                            </div>
                            <div class="checkout_left_one_input">
                                <label for="">Quận/Huyện</label>
                                <select class="select_checkout" aria-label="Default select example" name="province"
                                    id="province">
                                    <option selected disabled>Tỉnh/Thành phố</option>
                                </select>
                            </div>
                            <div class="checkout_left_one_input">
                                <label for="">Phường/Xã</label>
                                <select class="select_checkout" aria-label="Default select example" name="province"
                                    id="province">
                                    <option selected disabled>Tỉnh/Thành phố</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="checkout_main_left_two">
                        <div class="">
                            <div class="checkout_left_one_input">
                                <label for="">Lời nhắn</label>
                                <input type="text" class="input_checkout" id=""
                                    placeholder="Lưu ý cho người bán" name="name" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="checkout_main_left_three">
                        <div class="">
                            <span>Phương thức thanh toán</span>
                        </div>
                        <div class="checkout_main_left_three_pttt">
                            <input type="radio" id="momo" name="payment_method" value="momo"
                                style="display: none" />
                            <label for="momo">
                                <div class="checkout_main_left_three_img">
                                    <img src="img/momo.svg" alt="" />
                                </div>
                                <p>Thanh toán MoMo</p>
                            </label>
                        </div>
                        <div class="checkout_main_left_three_pttt">
                            <input type="radio" id="vnpay" name="payment_method" value="vnpay"
                                style="display: none" />
                            <label for="vnpay">
                                <div class="checkout_main_left_three_img">
                                    <img src="img/vnpay_new.svg" alt="" />
                                </div>
                                <p>Thanh toán VNPAY</p>
                            </label>
                        </div>
                        <div class="checkout_main_left_three_pttt">
                            <input type="radio" id="other" name="payment_method" value="other"
                                style="display: none" />
                            <label for="other">
                                <div class="checkout_main_left_three_img">
                                    <img src="img/other.svg" alt="" />
                                </div>
                                <p>Thanh toán bằng tiền mặt</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="checkout_main_right">
                    <div class="checkout_main_right_product">
                        <div class="row checkout_row_right">
                            <div class="col-md-3 col-sm-3 col-4">
                                <div class="img_checkout_product">
                                    <img src="img/city-product-1.webp" alt="" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-9 col-8">
                                <h5>Bộ Lego thành phố</h5>
                                <p class="">Số lượng: 1</p>
                                <p class="pricecheckout_mobile">
                                    <span>100.000đ</span>90.000đ
                                </p>
                            </div>
                            <div class="col-md-3 col-12 checkout_right_price">
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                        <div class="row checkout_row_right">
                            <div class="col-md-3 col-sm-3 col-4">
                                <div class="img_checkout_product">
                                    <img src="img/city-product-1.webp" alt="" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-9 col-8">
                                <h5>Bộ Lego thành phố</h5>
                                <p class="">Số lượng: 1</p>
                                <p class="pricecheckout_mobile">
                                    <span>100.000đ</span>90.000đ
                                </p>
                            </div>
                            <div class="col-md-3 col-12 checkout_right_price">
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                        <div class="row checkout_row_right">
                            <div class="col-md-3 col-sm-3 col-4">
                                <div class="img_checkout_product">
                                    <img src="img/city-product-1.webp" alt="" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-9 col-8">
                                <h5>Bộ Lego thành phố</h5>
                                <p class="">Số lượng: 1</p>
                                <p class="pricecheckout_mobile">
                                    <span>100.000đ</span>90.000đ
                                </p>
                            </div>
                            <div class="col-md-3 col-12 checkout_right_price">
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout_main_right_total">
                        <div class="check_item_total_one">
                            <div class="checkout_item_total">
                                <span>Tạm tính</span>
                                <span>1.000.000đ</span>
                            </div>
                            <div class="checkout_item_total">
                                <span>Giảm giá</span>
                                <span>100.000đ</span>
                            </div>
                        </div>
                        <div class="checkout_item_total_last">
                            <span>Tổng tiền</span>
                            <h2>100.000đ</h2>
                        </div>
                    </div>
                    <div class="checkout_main_right_next">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="back_cart_checkout">
                                    <a href="" class="">Quay lại giỏ hàng</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn_checkout">Hoàn tất đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->
@endsection
