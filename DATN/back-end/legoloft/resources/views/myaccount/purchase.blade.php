@extends('myaccount.layout.layout')
@section('title', 'Đơn hàng đã mua')
@section('content_myaccount')
    <div class="container">
        <div class="layout_member">
            <div class="layout_member_left">
                @include('myaccount.menuLeftAccount')
            </div>
            <div class="layout_member_right">
                <form action="">
                    <div class="container-account-right-item">
                        <div class="row">
                            <h4 class="m-0 ps-3">Tất cả đơn hàng đã mua</h4>
                        </div>
                        <div class="">
                            <div class="account_purchase">
                                <div class="account_purchase_header">
                                    <div class="account_purchase_header_left">
                                        <h5>Mã đơn hàng: #46363637</h5>
                                    </div>
                                    <div class="account_purchase_header_right">
                                        <p class="account_purchase_header_right_1">
                                            Giao hàng thành công
                                        </p>
                                        <p class="account_purchase_header_right_2">HOÀN THÀNH</p>
                                    </div>
                                </div>
                                <div class="row checkout_row_right">
                                    <div class="col-md-3 col-sm-3 col-4">
                                        <div class="img_checkout_product">
                                            <img src="../img/city-product-1.webp" alt="" />
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

                                <hr />
                                <div class="row account_purchase_thanhtien">
                                    <div class="col-md-12">
                                        <p class="px-1">Thành tiền:</p>
                                        <h4>1.000.000đ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
