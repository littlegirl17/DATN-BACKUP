    <!-- START NAV -->
    <nav class="nav_box">
        <div class="container">
            <div class="nav_box_item">
                <div class="nav-brand">
                    <a href="#" class="toggle-menu">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div>
                        <h3>IMAGE</h3>
                    </div>
                </div>
                <div class="nav_box_menu">
                    <ul class="nav_box_menu_item show-menu">
                        <li><a href="#">Trang chủ</a></li>
                        <li class="parent-menu">
                            <a href="category.html" class="toggle-submenu">Bộ theo chủ đề</a>
                        </li>
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Bài viết </a></li>
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

                    <div class="">
                        <i class="fa-solid fa-user text-light"></i>
                    </div>
                    <div class="">
                        <i class="fa-solid fa-bag-shopping text-light"></i>
                    </div>
                    <div class="">
                        <i class="fa-solid fa-bag-shopping text-light"></i>
                    </div>
                </div>
            </div>
        </div>
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
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Bài viết </a></li>
            </ul>
            <ul class="main_bar_menu_list">
                <li><a href="category.html">Xem tất cả chủ đề</a></li>
                @foreach ($categories as $category)
                    <li class="main_bar_menu_list_item">
                        <a href="#" class=""
                            data-category-id="{{ $category->id }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="main_bar_submenu_list">
                @foreach ($categories as $category)
                    <div class="submenu-category" data-category-id="{{ $category->id }}" style="display: none;">
                        @foreach ($category->categories_children as $item)
                            <li><a href="">{{ $item->name }}</a></li>
                        @endforeach
                    </div>
                @endforeach

            </ul>
        </div>
    </nav>
    <!-- END NAV -->
