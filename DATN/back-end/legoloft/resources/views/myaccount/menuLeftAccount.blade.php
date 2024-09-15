<aside class="layout_member_left_aside">
    <nav class="layout_member_left_nav">
        <ul>
            <li class="layout_member_left_nav_li accordion-item" onclick="setActiveAccount(this)">
                <a href="#" class="layout_member_left_nav_li_a">Tổng quan về tài khoản</a>
            </li>
            <li class="accordion-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" onclick="memberSubmenu(this)">Đơn hàng của tôi
                    </a>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <ul class="layout_member_left_submenu">
                    <li class="accordion-item layout_member_left_submenu_li" onclick="setActiveAccount(this)">
                        <a href="#"><i class="fa fa-solid fa-plus"></i>Mới</a>
                    </li>
                    <li class="accordion-item layout_member_left_submenu_li" onclick="setActiveAccount(this)">
                        <a href="#"><i class="fa fa-solid fa-plus"></i>Hủy</a>
                    </li>
                </ul>
            </li>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="#">Thay đôi mật khẩu</a>
            </li>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="">Đăng xuất</a>
            </li>
        </ul>
    </nav>
</aside>

<div class="accordion_member">
    <div class="accordion-header_member d-flex justify-content-between align-items-center">
        <p class="m-0 p-0"><strong>Tất cả chủ đề</strong></p>
        <i class="fa-solid fa-plus"></i>
    </div>
    <div class="accordion-content_member">
        <ul>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="member.html" class="">Tổng quan về tài khoản</a>
            </li>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="purchase.html">Đơn hàng của tôi</a>
            </li>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="password.html">Thay đôi mật khẩu</a>
            </li>
            <li class="accordion-item" onclick="setActiveAccount(this)">
                <a href="">Đăng xuất</a>
            </li>
        </ul>
    </div>
</div>
