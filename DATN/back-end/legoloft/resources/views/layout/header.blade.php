<!-- START NAV -->
<header class="header_top">
    <div class="container">
        <div class="header_top_main">
            <div class="header_top_item">
                <div class="header_top_item_child">
                    <span class="header_top_item_span"><i class="fa-regular fa-clock pe-1" style="color: #ffffff"></i>7:00
                        - 22:00</span>
                    <span class="ps-2"><i class="fa-solid fa-phone pe-1" style="color: #ffffff"></i>0353123771</span>
                </div>
            </div>

            <div class="header_top_item">
                <a href="{{ route('system') }}" class="text-light text-decoration-none"><span><i
                            class="fa-solid fa-location-dot pe-1" style="color: #ffffff"></i>Hệ thông cửa
                        hàng</span></a>
            </div>
        </div>
    </div>
</header>
<nav class="nav_box">
    <div class="container">
        <div class="nav_box_item">
            <div class="nav-brand">
                <a href="#" class="toggle-menu">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="nav_img_logo">
                    <a href="/"><img src="img/legoloft.png" alt="" /></a>
                </div>
            </div>
            <div class="nav_box_menu">
                <ul class="nav_box_menu_item show-menu">
                    <li>
                        <a href="/" class="">Trang chủ </a>
                    </li>
                    <li class="parent-menu">
                        <a href="category.html" class="toggle-submenu">Bộ theo chủ đề</a>
                    </li>
                    <li><a href="{{ route('policy') }}">Chính sách</a></li>
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    <li><a href="article.html">Bài viết </a></li>
                </ul>
            </div>
            <div class="nav_box_menu_right">
                <div class="">
                    <div class="containerInput">
                        <input checked="" class="checkbox" type="checkbox" />
                        <div class="mainbox">
                            <div class="iconContainer">
                                <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg"
                                    class="search_icon">
                                    <path
                                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                                    </path>
                                </svg>
                            </div>
                            <input class="search_input" placeholder="Tìm kiếm..." type="text" />
                        </div>
                    </div>
                </div>
                <div class="header_user_click">
                    <div class="header_user_img">
                        <img src="img/user.svg" alt="" />
                    </div>
                    <div class="header_user_content">
                        <div class="header_user_content_moc_item">
                            <img src="img/legomini.svg" alt="" />
                        </div>
                        <div class="m-0 p-0">
                            <div class="btn_contain">
                                <button class="btn-login">Đăng nhập</button>
                            </div>
                            <div class="btn_contain">
                                <button class="btn-register">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <a href="cart.html"> <img src="img/cart.svg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="nav_box_menu_right_mobile">
        <input type="text" placeholder="Tìm kiếm tại đây..." />
    </div>
    <div class="main_bar_menu_bg">
        <div class="main_bar_menu submenu">
            <div class="button_close_back">
                <div class="">
                    <p class="back-button">Back</p>
                </div>
                <div class="submenu_close">
                    <p class="close-button">X</p>
                </div>
            </div>
            <ul class="main_bar_menu_title">
                <li><a href="#">Trang chủ</a></li>
                <li class="d-flex justify-content-between align-items-center">
                    <a href="#" class="main_bar_menu_title_item">Bộ theo chủ đề</a>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li><a href="{{ route('policy') }}">Chính sách</a></li>
                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                <li><a href="#">Bài viết </a></li>
            </ul>
            <ul class="main_bar_menu_list">
                <li><a href="category.html">Xem tất cả chủ đề</a></li>
                <li class="main_bar_menu_list_item">
                    <a href="#">danh muc con</a>
                </li>
                <li class="main_bar_menu_list_item">
                    <a href="#">danh muc con</a>
                </li>
                <li class="main_bar_menu_list_item">
                    <a href="#">danh muc con</a>
                </li>
                <li class="main_bar_menu_list_item">
                    <a href="#">danh muc con</a>
                </li>
                <li class="main_bar_menu_list_item">
                    <a href="#">danh muc con</a>
                </li>
            </ul>
            <ul class="main_bar_submenu_list">
                <div class="submenu-category" style="display: none">
                    <li><a href="#">danh muc con1</a></li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAV -->
