@extends('layout.layout')
@section('title', 'Danh mục sản phẩm')
@section('content')
    <!-- START MAIN -->
    <div class="background_home">
        <div class="container pt-5">
            <div class="row theme_category_title">
                <h2>Đồ chơi LEGO® Thành Phố</h2>
            </div>
            <div class="row theme_category_summary">
                <div class="col-md-6">
                    <h3>Hiển thị 99 sản phẩm</h3>
                </div>
                <div class="col-md-6 theme_category_summary_right">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Sắp xếp</option>
                        <option value="1">Từ A -> Z</option>
                        <option value="1">Từ Z -> A</option>
                        <option value="1">Giá giảm dần</option>
                        <option value="1">Giá tăng dần</option>
                    </select>
                </div>
            </div>
            <div class="category_product_main">
                <aside>
                    <div class="category_product_main_left">
                        <div class="category_product_main_left_1">
                            <div class="accordion">
                                <div class="accordion-header d-flex justify-content-between align-items-center">
                                    <p class="m-0 p-0">Tất cả chủ đề</p>
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="accordion-content">
                                    <div class="">
                                        <ul>
                                            <li>
                                                <a href="">Thành phố</a>
                                            </li>
                                            <li><a href="">Thành phố</a></li>
                                            <li><a href="">Thành phố</a></li>
                                            <li><a href="">Thành phố</a></li>
                                            <li><a href="">Thành phố</a></li>
                                            <li><a href="">Thành phố</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category_product_main_left_1">
                            <div class="accordion">
                                <div class="accordion-header d-flex justify-content-between align-items-center">
                                    <p class="m-0 p-0">Lọc giá</p>
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="accordion-content">
                                    <div class="accordion-content-item">
                                        <input type="checkbox" name="" id="" />
                                        <span>Dưới 100.000đ</span>
                                    </div>
                                    <div class="accordion-content-item">
                                        <input type="checkbox" name="" id="" />
                                        <span> 100.000đ - 200.000đ</span>
                                    </div>
                                    <div class="accordion-content-item">
                                        <input type="checkbox" name="" id="" />
                                        <span> 200.000đ - 300.000đ</span>
                                    </div>
                                    <div class="accordion-content-item">
                                        <input type="checkbox" name="" id="" />
                                        <span> 300.000đ - 400.000đ</span>
                                    </div>
                                    <div class="accordion-content-item">
                                        <input type="checkbox" name="" id="" />
                                        <span> Trên 500.000đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="category_product_main_right">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                            <a href="" class="text-black text-decoration-none">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        <div class="category_product_box_icon">
                                            <i class="fa-regular fa-heart"></i>
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="img/city_product-1.webp" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="">Tên sản phẩm</a></h3>
                                            </div>
                                            <div class="category_product_box_price">
                                                <span>100.000đ</span>90.000đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->
@endsection
