@extends('layout.layout')
@section('title', 'Danh mục sản phẩm')
@section('content')
    <!-- START MAIN -->
    <div class="background_home">
        <div class="container pt-5">
            <div class="row theme_category_title">
                <h2>LEGO® {{ $categoryName->name }}</h2>
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
                                            @foreach ($categoryAll as $item)
                                                <li>
                                                    <a
                                                        href="{{ route('categoryProduct', $item->id) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
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
                        @foreach ($productCategory as $item)
                            @php
                                $priceDiscount = 0;
                                $userGroupId = Auth::check() ? Auth::user()->user_group_id : 1;
                                $productDiscountPrice = $item->productDiscount
                                    ->where('user_group_id', $userGroupId)
                                    ->first();

                                $price = $item->price ? $item->price : null;

                                if ($productDiscountPrice) {
                                    $priceDiscount = $productDiscountPrice ? $productDiscountPrice->price : null;
                                }

                                $percent = ceil((($item->price - $priceDiscount) / $item->price) * 100);
                                $productImageCollect = $item->productImage->pluck('images'); // pluck lấy một tập hợp các giá trị của trường cụ thể
                                if (Auth::check()) {
                                    $isFavourite = $item->favourite
                                        ->where('user_id', Auth::id())
                                        ->contains('product_id', $item->id); //contains kiểm tra xem một tập hợp (collection) có chứa một giá trị cụ thể hay không.
                                } else {
                                    $favourite = json_decode(Cookie::get('favourite', '[]'), true);
                                    // Lấy danh sách tất cả các product_id từ mảng $favourite
                                    $productIds = array_column($favourite, 'product_id'); //Lấy tất cả các product_id từ các mảng con trong $favourite và tạo ra một mảng chỉ chứa các product_id.

                                    // Kiểm tra xem $item->id có nằm trong danh sách product_id không
                                    $isFavourite = is_array($productIds) && in_array((string) $item->id, $productIds); //Kiểm tra xem product_id của $item->id có nằm trong danh sách sản phẩm yêu thích hay không. Chúng ta ép kiểu item->id thành chuỗi để so sánh chính xác với product_id trong mảng (vì product_id trong cookie là chuỗi).
                            } @endphp
                            <div class="col-md-4 col-sm-6 col-12 category_product_main_right_item">
                                <div class="category_product_box">
                                    <div class="category_product_box_effect">
                                        @if ($item->outstanding == 1)
                                            <div class="categoryproduct_box_tag_outstanding">Nổi bật </div>
                                        @endif
                                        @if (isset($productDiscountPrice))
                                            <div class="categoryproduct_box_tag_sale_outstanding">{{ $percent }}%
                                            </div>
                                        @endif
                                        <div class="category_product_box_icon">
                                            <button onclick="addFavourite('{{ $item->id }}')" class="outline-0 border-0"
                                                style="background-color: transparent">
                                                <i class="fa-solid fa-heart {{ $isFavourite ? 'red' : '' }}"
                                                    id="favourite-{{ $item->id }}"></i>
                                            </button>
                                            <button type="button" class="outline-0 border-0 "
                                                style="background-color: transparent"
                                                onclick="showModalProduct(event,'{{ $item->id }}','{{ $item->image }}','{{ $item->name }}','{{ $item->price }}','{{ $priceDiscount }}','{{ json_encode($productImageCollect) }}')">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            {{-- truyền vào id sản phẩm và số lượng cần thêm,user_id server láy từ sesion --}}
                                            <button type="button" onclick="addToCart('{{ $item->id }}', 1)"
                                                class="outline-0 border-0 " style="background-color: transparent">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </button>
                                        </div>
                                        <div class="category_product_img">
                                            <img src="{{ asset('img/' . $item->image) }}" alt="" />
                                        </div>
                                        <div class="category_product_box_content_out">
                                            <div class="product_box_content">
                                                <h3><a href="{{ route('detail', $item->slug) }}">{{ $item->name }}</a>
                                                </h3>
                                            </div>
                                            @if ($productDiscountPrice)
                                                <div class="product_box_price">
                                                    <span>{{ number_format($item->price, 0, ',', '.') . 'đ' }}</span>{{ number_format($productDiscountPrice->price, 0, ',', '.') . 'đ' }}
                                                </div>
                                            @else
                                                <div class="product_box_price">
                                                    <span></span>{{ number_format($item->price, 0, ',', '.') . 'đ' }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="div_nav_pagination">
                <nav class="nav_pagination">
                    <ul class="pagination">
                        <li>{{ $productCategory->links() }}</li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <div id="modal_home" class="modal_product_main">
    </div>
    <!-- END MAIN -->
@endsection
