 @extends('admin.layout.layout')
 @Section('title', 'Dashboard')
 @Section('content')
     <div class="container-fluid">

         <h3 class="title-page cssTitle">
             Bảng điều khiển
         </h3>
         <div class="row dash_row my-3">
             <div class="col-md-3 ">
                 <div class="dash_product">
                     <div class="dash_product_header">
                         <span>Sản phẩm</span>
                     </div>
                     <div class="dash_product_main">
                         <div class="dash_product_content">
                             <span>Danh mục</span>
                             <p>{{ $countCategory }}</p>
                             <a href="{{ route('category') }}">Chi tiết</a>
                         </div>
                         <div class="dash_product_content">
                             <span>Sản phẩm</span>
                             <p>{{ $countProduct }}</p>
                             <a href="{{ route('product') }}">Chi tiết</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 ">
                 <div class="dash_article">
                     <div class="dash_article_header">
                         <span>Bài viết</span>
                     </div>
                     <div class="dash_article_main">
                         <div class="dash_article_content">
                             <span>Danh mục</span>
                             <p>{{ $countCategoryArticle }}</p>
                             <a href="{{ route('categoryArticle') }}">Chi tiết</a>
                         </div>
                         <div class="dash_article_content">
                             <span>Bài viết</span>
                             <p>{{ $countArticle }}</p>
                             <a href="{{ route('article') }}">Chi tiết</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 ">
                 <div class="dash_user">
                     <div class="dash_user_header">
                         <span>Khách hàng</span>
                     </div>
                     <div class="dash_user_main">
                         <div class="dash_user_content">
                             <span>Nhóm khách hàng</span>
                             <p>{{ $countUserGroup }}</p>
                             <a href="{{ route('userGroup') }}">Chi tiết</a>
                         </div>
                         <div class="dash_user_content">
                             <span>Khách hàng</span>
                             <p>{{ $countUser }}</p>
                             <a href="{{ route('userAdmin') }}">Chi tiết</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 ">
                 <div class="dash_admin">
                     <div class="dash_admin_header">
                         <span>Người dùng</span>
                     </div>
                     <div class="dash_admin_main">
                         <div class="dash_admin_content">
                             <span>Nhóm người dùng</span>
                             <p>{{ $countAdministrationGroup }}</p>
                             <a href="{{ route('adminstrationGroup') }}">Chi tiết</a>
                         </div>
                         <div class="dash_admin_content">
                             <span>Người dùng</span>
                             <p>{{ $countAdministration }}</p>
                             <a href="{{ route('adminstration') }}">Chi tiết</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         {{-- <div class="row mt-4 cardTwoDashboard">
             <div class="col-md-3">
                 <div class="cardTwoDashboardItem">
                     <h6 class="text-black">
                         Tổng đơn hàng
                     </h6>
                     <h3> đơn hàng</h3>
                     <div class="iconCardDash">
                         <span><i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></span>
                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="cardTwoDashboardItem">
                     <h6 class="text-black">
                         Tổng doanh số
                     </h6>
                     <h3>đ</h3>
                     <div class="iconCardDash">
                         <span>$</span>
                     </div>
                 </div>
             </div>
             <div class="col-md-3"></div>
             <div class="col-md-3"></div>
         </div> --}}
         <div class="row bg_favourite_dash mt-3">
             <div class="col-md-6">
                 <canvas id="cartChart" width="400" height="290"></canvas>
             </div>
             <div class="col-md-6 py-2">
                 <span class="">Top 8 sản phẩm thêm nhiều vào giỏ hàng</span>
                 <div class="dashFavorite10_main">
                     <ul>
                         @foreach ($cartStatistical as $item)
                             <li>
                                 <a href="{{ route('detail', $item->product->slug) }}">
                                     <div class="dashFavorite10">
                                         <div class="dashFavorite10_img">
                                             <img src="{{ asset('img/' . $item->product->image) }}" alt="">
                                         </div>
                                         <div class="dashFavorite10_content">
                                             <span>{{ $item->product->name }}</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
         <div class="row mt-5 bg_favourite_dash">

             <div class="col-md-6 ">
                 <canvas id="favouriteChart" width="400" height="290"></canvas>
             </div>
             <div class="col-md-6 py-2">
                 <span class="">Top 8 sản phẩm yêu thích</span>
                 <div class="dashFavorite10_main">
                     <ul>
                         @foreach ($favouriteStatistical as $item)
                             <li>
                                 <a href="{{ route('detail', $item->product->slug) }}">
                                     <div class="dashFavorite10">
                                         <div class="dashFavorite10_img">
                                             <img src="{{ asset('img/' . $item->product->image) }}" alt="">
                                         </div>
                                         <div class="dashFavorite10_content">
                                             <span>{{ $item->product->name }}</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     </div>

 @endsection
 @section('dashboardAdminScript')
     <script>
         const ctx = document.getElementById('favouriteChart').getContext('2d');
         const favouriteChart = new Chart(ctx, {
             type: 'line',
             data: {
                 labels: {!! json_encode($favouriteStatistical->pluck('product_name')) !!},
                 datasets: [{
                     label: 'Tổng yêu thích',
                     data: {!! json_encode($favouriteStatistical->pluck('favourite_count')) !!},

                     backgroundColor: [
                         // Màu sắc cho các cột
                         '#fff',

                     ],
                     borderColor: [
                         'rgba(255, 99, 132, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(153, 102, 255, 1)',

                     ],
                     borderWidth: 1
                 }]
             },
             options: {
                 legend: {
                     display: false
                 },
                 title: {
                     display: true,
                     text: "Báo cáo top 8 sản phẩm yêu thích"
                 },
                 scales: {
                     xAxes: [{
                         ticks: {
                             display: false // Ẩn tên sản phẩm trên trục x
                         },
                         gridLines: {
                             display: false // Ẩn lưới trên trục x nếu cần
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             beginAtZero: true, // Bắt đầu từ 0
                             callback: function(value) {
                                 return Number.isInteger(value) ? value : ''; // Chỉ hiển thị số nguyên
                             }
                         }
                     }]
                 },


                 plugins: {
                     tooltip: {},

                 }
             }
         });
     </script>
     <script>
         console.log({!! json_encode($cartStatistical->pluck('cart_count')) !!});

         const cartChart = document.getElementById('cartChart').getContext('2d');
         const cartChartFunction = new Chart(cartChart, {
             type: 'radar',
             data: {

                 labels: {!! json_encode($cartStatistical->pluck('product_name')) !!},
                 datasets: [{
                     label: 'Tổng sản phẩm trong giỏ hàng',
                     data: {!! json_encode($cartStatistical->pluck('cart_count')) !!},
                     backgroundColor: 'rgba(0, 0, 0, 0.2)', // Màu nền
                     borderColor: [
                         'rgba(255, 99, 132, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(153, 102, 255, 1)',

                     ],
                     borderWidth: 1
                 }]
             },
             options: {
                 legend: {
                     display: false
                 },
                 title: {
                     display: true,
                     text: "Báo cáo top 8 sản phẩm được thêm vào giỏ hàng nhiều nhất"
                 },
                 scale: {
                     ticks: {
                         beginAtZero: true,
                         callback: function(value) {
                             return Number.isInteger(value) ? value : '';
                         }
                     },
                     gridLines: {
                         color: '#e0e0e0' // Màu lưới
                     }
                 },
                 tooltips: {
                     callbacks: {
                         label: function(tooltipItem, data) {
                             const productName = data.labels[tooltipItem.index]; // Tên sản phẩm
                             const count = tooltipItem.yLabel; // Số lượng sản phẩm
                             return productName + ': ' + count; // Hiển thị tên và số lượng
                         }
                     }
                 }
             }
         });
     </script>

 @endsection
