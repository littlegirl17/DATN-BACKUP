@extends('layout.layout')
@section('title', 'Giỏ hàng')
@section('content')
    <!-- START MAIN -->
    <div class="container cart_container">
        <div class="cart_title">
            <h2>Giỏ hàng</h2>
        </div>

        <div class="cart_box">
            <div class="">
                <div class="cart_item">
                    <div class="cart_item_img">
                        <img src="img/city-product-1.webp" alt="" />
                    </div>
                    <div class="cart_item_content">
                        <div class="cart_item_content_name">
                            <h2>Tàu thám hiểm Bắc Cực</h2>
                        </div>
                        <div class="cart_item_content_price">
                            <span>1.500.000đ</span>1.200.000đ
                        </div>
                        <div class="cart_item_content_quantity">
                            <button class="cart_quantity_decrease">-</button>
                            <input type="text" value="1" class="cart_quantity_number" />
                            <button class="cart_quantity_increase">+</button>
                        </div>
                    </div>
                    <div class="cart_item_close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="cart_item_img">
                        <img src="img/city-product-1.webp" alt="" />
                    </div>
                    <div class="cart_item_content">
                        <div class="cart_item_content_name">
                            <h2>Tàu thám hiểm Bắc Cực</h2>
                        </div>
                        <div class="cart_item_content_price">
                            <span>1.500.000đ</span>1.200.000đ
                        </div>
                        <div class="cart_item_content_quantity">
                            <button class="cart_quantity_decrease">-</button>
                            <input type="text" value="1" class="cart_quantity_number" />
                            <button class="cart_quantity_increase">+</button>
                        </div>
                    </div>
                    <div class="cart_item_close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="cart_item_img">
                        <img src="img/city-product-1.webp" alt="" />
                    </div>
                    <div class="cart_item_content">
                        <div class="cart_item_content_name">
                            <h2>Tàu thám hiểm Bắc Cực</h2>
                        </div>
                        <div class="cart_item_content_price">
                            <span>1.500.000đ</span>1.200.000đ
                        </div>
                        <div class="cart_item_content_quantity">
                            <button class="cart_quantity_decrease">-</button>
                            <input type="text" value="1" class="cart_quantity_number" />
                            <button class="cart_quantity_increase">+</button>
                        </div>
                    </div>
                    <div class="cart_item_close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="cart_item_img">
                        <img src="img/city-product-1.webp" alt="" />
                    </div>
                    <div class="cart_item_content">
                        <div class="cart_item_content_name">
                            <h2>Tàu thám hiểm Bắc Cực</h2>
                        </div>
                        <div class="cart_item_content_price">
                            <span>1.500.000đ</span>1.200.000đ
                        </div>
                        <div class="cart_item_content_quantity">
                            <button class="cart_quantity_decrease">-</button>
                            <input type="text" value="1" class="cart_quantity_number" />
                            <button class="cart_quantity_increase">+</button>
                        </div>
                    </div>
                    <div class="cart_item_close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="btn_two_cart">
                    <a class="btn_goon_cart">Tiếp tục mua sắm</a>

                    <a class="btn_remove_cart">Xóa hết giỏ hàng</a>
                </div>
            </div>
            <div class="cart_item_right">
                <div class="cart_right_coupon">
                    <div class="coupon_title">
                        <h3>Nhập mã giảm giá</h3>
                    </div>
                    <div class="d-flex">
                        <input type="text" class="cart_right_coupon_input" placeholder="Nhập mã giảm giá" />
                        <button type="submit" class="detail_btn_cart">Áp mã</button>
                    </div>
                </div>
                <div class="cart_right_total">
                    <div class="cart_right_total_item">
                        <span>Thành tiền</span>
                        <span>1.000.000đ</span>
                    </div>
                    <div class="cart_right_total_item">
                        <span>Mã giảm</span>
                        <span>50.000đ</span>
                    </div>
                    <div class="cart_right_total_item">
                        <h5>Tổng tiền</h5>
                        <span>1.050.000đ</span>
                    </div>
                    <div class="row_btn_checkout">
                        <a href="" class="btn_checkout">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->
@endsection
