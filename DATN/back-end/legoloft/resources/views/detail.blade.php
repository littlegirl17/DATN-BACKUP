@extends('layout.layout')
@section('title', 'Chi tiết')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="detail_product_left">
                    <div class="detail_product_left_img_item">
                        <ul>
                            <li><img src="img/city-product-5.webp" alt="" /></li>
                            <li><img src="img/city-product-3.webp" alt="" /></li>
                            <li><img src="img/city-product-4.webp" alt="" /></li>
                            <li><img src="img/city-product-1.webp" alt="" /></li>
                            <li><img src="img/city-product-5.webp" alt="" /></li>
                            <li><img src="img/city-product-3.webp" alt="" /></li>
                            <li><img src="img/city-product-4.webp" alt="" /></li>
                            <li><img src="img/city-product-1.webp" alt="" /></li>
                            <li><img src="img/city-product-5.webp" alt="" /></li>
                            <li><img src="img/city-product-3.webp" alt="" /></li>
                            <li><img src="img/city-product-4.webp" alt="" /></li>
                            <li><img src="img/city-product-1.webp" alt="" /></li>
                        </ul>
                    </div>
                    <div class="detail_product_left_img">
                        <img src="img/city-product-1.webp" alt="" />
                        <div class="detail_prev_next">
                            <button class="prev_detail_img" id="prevBtn">
                                << /button>
                                    <button class="next_detail_img" id="nextBtn">></button>
                        </div>
                        <div class="detail_product_left_img_item_res">
                            <ul>
                                <li><img src="img/city-product-5.webp" alt="" /></li>
                                <li><img src="img/city-product-3.webp" alt="" /></li>
                                <li><img src="img/city-product-4.webp" alt="" /></li>
                                <li><img src="img/city-product-1.webp" alt="" /></li>
                                <li><img src="img/city-product-5.webp" alt="" /></li>
                                <li><img src="img/city-product-3.webp" alt="" /></li>
                                <li><img src="img/city-product-4.webp" alt="" /></li>
                                <li><img src="img/city-product-1.webp" alt="" /></li>
                                <li><img src="img/city-product-5.webp" alt="" /></li>
                                <li><img src="img/city-product-3.webp" alt="" /></li>
                                <li><img src="img/city-product-1.webp" alt="" /></li>
                                <li><img src="img/city-product-5.webp" alt="" /></li>
                                <li><img src="img/city-product-3.webp" alt="" /></li>
                                <li><img src="img/city-product-4.webp" alt="" /></li>
                                <li><img src="img/city-product-1.webp" alt="" /></li>
                                <li><img src="img/city-product-5.webp" alt="" /></li>
                                <li><img src="img/city-product-3.webp" alt="" /></li>
                                <li><img src="img/city-product-4.webp" alt="" /></li>
                                <li><img src="img/city-product-1.webp" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="detail_product_right">
                    <div class="detail_product_right_one">
                        <span>Còn hàng</span>
                    </div>
                    <div class="detail_product_right_two">
                        <h1>Mercedes-Benz G 500 PROFESSIONAL Line</h1>
                    </div>
                    <div class="detail_product_right_three">
                        <span>100.000đ</span>90.000đ
                    </div>
                    <div class="detail_product_right_four">
                        <div class="detail_product_right_four_item">
                            <button class="right_four_item_decrease">-</button>
                            <input type="text" class="right_four_item_number" value="1" />
                            <button class="right_four_item_increase">+</button>
                        </div>
                        <div class="detail_product_right_four_span">
                            <span>Giới hạn 5</span>
                        </div>
                    </div>
                    <div class="detail_product_right_five">
                        <div class="right_five_bnt">
                            <button class="detail_btn">Mua ngay</button>
                            <button class="detail_btn">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 accordion-section">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Thông số kỹ thuật
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-9 col-sm-8 col-12">
                                <p>
                                    Những cuộc phiêu lưu thú vị đang ở phía trước với LEGO® City
                                    Arctic Explorer Ship (60368) hùng mạnh. Chiếc thuyền đồ chơi
                                    khổng lồ có thể nổi này được trang bị đầy đủ chi tiết chân
                                    thực cho những cuộc phiêu lưu khám phá giàu trí tưởng tượng.
                                    Bộ đồ chơi cao cấp này cũng bao gồm một máy bay trực thăng,
                                    xuồng, tàu ngầm ROV dưới nước và một xác tàu đắm của người
                                    Viking, cùng với một rương kho báu, 7 nhân vật nhỏ và một
                                    nhân vật cá voi sát thủ.
                                </p>
                                <p>
                                    Trò chơi xây dựng kỹ thuật số thú vị dành cho trẻ em từ 7
                                    tuổi trở lên Ứng dụng LEGO Builder hướng dẫn trẻ nhỏ vào
                                    cuộc phiêu lưu xây dựng trực quan với các công cụ cho phép
                                    trẻ phóng to và xoay mô hình 3D, theo dõi quá trình xây dựng
                                    cũng như khám phá và lưu các bộ đồ chơi ảo.
                                </p>
                                <p>
                                    Những cuộc phiêu lưu không giới hạn Trẻ em lớn lên trong môi
                                    trường xung quanh là những phương tiện và máy móc tuyệt vời,
                                    và với bộ lắp ghép LEGO City, trẻ em có thể khám phá chúng
                                    một cách gần gũi với các mô hình thực tế và các nhân vật vui
                                    nhộn truyền cảm hứng cho trò chơi mở, giàu trí tưởng tượng.
                                    Kết hợp bộ này với các bộ khác trong dòng LEGO City để có
                                    thêm nhiều niềm vui.
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12">
                                <div class="detail_accordion_img">
                                    <img src="img/city-product-1.webp" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Phản hồi khách hàng (10) đánh giá
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="product_review">
                            <ul>
                                <li>
                                    <p>Ngày 6 tháng 3 năm 2022</p>
                                    <span class="product_review_name">HuynhKha</span>
                                    <span class="product_review_content">Tôi thực sự thích bản dựng này, hệ thống treo
                                        thanh đẩy
                                        được triển khai rất tốt, thiết kế rất phù hợp với chiếc xe
                                        thật, là một người hâm mộ F1 lớn, đây là điều bắt buộc,
                                        bản dựng khá nhanh nhưng sản phẩm cuối cùng trông thật
                                        tuyệt vời.</span>
                                    <div class="product_review_img">
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-1.webp" alt="" />
                                        </button>
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-5.webp" alt="" />
                                        </button>
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-1.webp" alt="" />
                                        </button>
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-4.webp" alt="" />
                                        </button>
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-3.webp" alt="" />
                                        </button>
                                    </div>
                                </li>
                                <li>
                                    <p>Ngày 6 tháng 3 năm 2022</p>
                                    <span class="product_review_name">HuynhKha</span>
                                    <span class="product_review_content">Tôi thực sự thích bản dựng này, hệ thống treo
                                        thanh đẩy
                                        được triển khai rất tốt, thiết kế rất phù hợp với chiếc xe
                                        thật, là một người hâm mộ F1 lớn, đây là điều bắt buộc,
                                        bản dựng khá nhanh nhưng sản phẩm cuối cùng trông thật
                                        tuyệt vời.</span>
                                    <div class="product_review_img">
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-1.webp" alt="" />
                                        </button>
                                    </div>
                                </li>
                                <li>
                                    <p>Ngày 6 tháng 3 năm 2022</p>
                                    <span class="product_review_name">HuynhKha</span>
                                    <span class="product_review_content">Tôi thực sự thích bản dựng này, hệ thống treo
                                        thanh đẩy
                                        được triển khai rất tốt, thiết kế rất phù hợp với chiếc xe
                                        thật, là một người hâm mộ F1 lớn, đây là điều bắt buộc,
                                        bản dựng khá nhanh nhưng sản phẩm cuối cùng trông thật
                                        tuyệt vời.</span>
                                    <div class="product_review_img">
                                        <button class="product_review_imgbtn">
                                            <img src="img/city-product-1.webp" alt="" />
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Placeholder content for this accordion, which is intended to
                        demonstrate the <code>.accordion-flush</code> class. This is the
                        third item's accordion body. Nothing more exciting happening here
                        in terms of content, but just filling up the space to make it
                        look, at least at first glance, a bit more representative of how
                        this would look in a real-world application.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="detail_product_section">
        <div class="container">
            <div class="title_home">
                <h2 class="">Đề xuất cho bạn</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="product_box">
                        <div class="product_box_effect">
                            <div class="product_box_tag">Nổi bật</div>
                            <div class="product_box_icon">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="product_box_image">
                                <img src="img/product-test.webp" alt="" />
                            </div>
                            <div class="product_box_content_out">
                                <div class="product_box_content">
                                    <h3><a href="">Tên sản phẩm</a></h3>
                                </div>
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product_box">
                        <div class="product_box_effect">
                            <div class="product_box_tag">Nổi bật</div>
                            <div class="product_box_icon">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="product_box_image">
                                <img src="img/product-test.webp" alt="" />
                            </div>
                            <div class="product_box_content_out">
                                <div class="product_box_content">
                                    <h3><a href="">Tên sản phẩm</a></h3>
                                </div>
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product_box">
                        <div class="product_box_effect">
                            <div class="product_box_tag">Nổi bật</div>
                            <div class="product_box_icon">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="product_box_image">
                                <img src="img/product-test.webp" alt="" />
                            </div>
                            <div class="product_box_content_out">
                                <div class="product_box_content">
                                    <h3><a href="">Tên sản phẩm</a></h3>
                                </div>
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product_box">
                        <div class="product_box_effect">
                            <div class="product_box_tag">Nổi bật</div>
                            <div class="product_box_icon">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="product_box_image">
                                <img src="img/product-test.webp" alt="" />
                            </div>
                            <div class="product_box_content_out">
                                <div class="product_box_content">
                                    <h3><a href="">Tên sản phẩm</a></h3>
                                </div>
                                <div class="product_box_price">
                                    <span>100.000đ</span>90.000đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal_review" class="modal_review">
        <div class="modal_review_box">
            <span class="close my-0">&times;</span>
            <div id="modal_review_box_img"></div>
        </div>
    </div>
@endsection
