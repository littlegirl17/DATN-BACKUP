<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\admin\OrderAdminController;
use App\Http\Controllers\admin\BannerAdminController;
use App\Http\Controllers\admin\CouponAdminController;
use App\Http\Controllers\admin\ArticleAdminController;
use App\Http\Controllers\admin\CommentAdminController;
use App\Http\Controllers\admin\ProductAdminController;
use App\Http\Controllers\Admin\AdminstrationController;
use App\Http\Controllers\admin\AssemblyAdminController;
use App\Http\Controllers\admin\CategoryAdminController;
use App\Http\Controllers\admin\CategoryArticleAdminController;
use App\Http\Controllers\admin\EmployeeAdminController;

Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/system', function () {
    return view('system');
})->name('system');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');






Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('login', [UserController::class, 'login'])->name('loginForm');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('forgetPassword', function () {
    return view('forgetPassword');
})->name('forgetPassword');
Route::post('forgetPassword', [UserController::class, 'forgetPassword'])->name('forgetPasswordForm');


Route::get('confirmation', function () {
    return view('confirmationCodePassword');
})->name('confirmationCodePassword');
Route::post('confirmation', [UserController::class, 'confirmationPassword'])->name('confirmationPasswordForm');

Route::get('resetPassword', function () {
    return view('reenterPassword');
})->name('resetPassword');
Route::post('resetPassword', [UserController::class, 'resetPassword'])->name('resetPassword');


Route::get('register', function () {
    return view('register');
})->name('register');
Route::post('register', [UserController::class, 'register'])->name('registerForm');

Route::get('categoryAll', [CategoryController::class, 'categoryAll'])->name('categoryAll');
Route::get('categoryProduct/{id}', [CategoryController::class, 'categoryProduct'])->name('categoryProduct');


Route::get('cart', [CartController::class, 'getCart'])->name('cart');
Route::post('cartForm', [CartController::class, 'cartAdd'])->name('cartForm');
Route::get('increaseQuantity/{id}', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::get('decreaseQuantity/{id}', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::get('deleteItemCart/{id}', [CartController::class, 'deleteItemCart'])->name('deleteItemCart');
Route::get('deleteAllCart', [CartController::class, 'deleteAllCart'])->name('deleteAllCart');

Route::post('couponForm', [CouponController::class, 'couponApply'])->name('couponForm');
Route::get('couponDelete', [CouponController::class, 'couponDelete'])->name('couponDelete');

Route::middleware('user')->group(function () {
    Route::get('member', [MyAccountController::class, 'member'])->name('member');
    Route::put('memberForm/{id}', [MyAccountController::class, 'memberForm'])->name('memberForm');

    Route::get('purchase', [MyAccountController::class, 'purchase'])->name('purchase');
    Route::get('informationPurchase/{id}', [MyAccountController::class, 'inforPurchase'])->name('inforPurchase');
    Route::get('waitConfirmation', [MyAccountController::class, 'waitConfirmation'])->name('waitConfirmation');
    Route::get('pendingPurchase', [MyAccountController::class, 'pendingPurchase'])->name('pendingPurchase');
    Route::get('shipping', [MyAccountController::class, 'shipping'])->name('shipping');
    Route::get('cancel', [MyAccountController::class, 'cancel'])->name('cancel');
    Route::get('cancelConfirmation/{id}', [MyAccountController::class, 'cancelConfirmation'])->name('cancelConfirmation');
});


Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('form-checkout', [CheckoutController::class, 'checkoutForm'])->name('checkoutForm');
Route::get('order', [CheckoutController::class, 'viewOrder'])->name('order');

Route::post('buyNow', [CheckoutController::class, 'buyNow'])->name('buyNow');
Route::post('employeeBuy', [CheckoutController::class, 'employeeBuy'])->name('employeeBuy');

Route::get('detail/{slug}', [ProductController::class, 'detail'])->name('detail');
Route::post('commentReview', [ProductController::class, 'commentReview'])->name('commentReview');
Route::get('viewFavourite', [ProductController::class, 'viewFavourite'])->name('viewFavourite');
Route::post('favourite', [ProductController::class, 'favourite'])->name('favourite');



Route::get('block', function () {
    return view('block');
})->name('blocks');


Route::get('blocks', [BlockController::class, 'index']);
Route::post('blocks', [BlockController::class, 'store']);
Route::put('blocks/{id}', [BlockController::class, 'update']);



/* ----------------------------------- ROUTE ADMIN ------------------------------------ */
Route::get('admin/login', function () {
    return view('admin.login');
})->name('adminLogin');
Route::post('admin/login', [LoginController::class, 'login'])->name('adminLoginForm');

Route::prefix('admin')->middleware('admin')->group(function () { // prefix: được sử dụng để nhóm các route lại với nhau dưới một tiền tố chung.

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::middleware(['admin:product'])->group(function () {
        Route::get('product', [ProductAdminController::class, 'product'])->name('product');
        Route::get('addProduct', [ProductAdminController::class, 'productAdd'])->name('addProduct');
        Route::post('add-Product', [ProductAdminController::class, 'productAdd'])->name('addFormProduct');
        Route::get('editProduct/{id}', [ProductAdminController::class, 'productEdit'])->name('editProduct');
        Route::put('editProduct/{id}', [ProductAdminController::class, 'productUpdate']);
        Route::post('deleteProduct', [ProductAdminController::class, 'productDeleteCheckbox'])->name('deleteProduct');
        Route::put('updateStatusProduct/{id}', [ProductAdminController::class, 'productUpdateStatus'])->name('productUpdateStatus');
        Route::post('searchProduct', [ProductAdminController::class, 'productSearch'])->name('searchProduct');
        Route::get('productDeleteImages/{product_id}', [ProductAdminController::class, 'productDeleteImages'])->name('productDeleteImages');
        Route::get('productDeleteDiscount/{id}', [ProductAdminController::class, 'productDeleteDiscount'])->name('productDeleteDiscount');
    });

    Route::middleware(['admin:administration'])->group(function () {
        Route::get('adminstration', [AdminstrationController::class, 'adminstration'])->name('adminstration');
        Route::get('addAdminstration', [AdminstrationController::class, 'adminstrationAdd'])->name('addAdminstration');
        Route::post('add-Adminstration', [AdminstrationController::class, 'adminstrationAdd'])->name('addFormAdminstration');
        Route::get('editAdminstration/{id}', [AdminstrationController::class, 'adminstrationEdit'])->name('editAdminstration');
        Route::put('editAdminstration/{id}', [AdminstrationController::class, 'adminstrationUpdate']);
        Route::post('deleteAdminstration', [AdminstrationController::class, 'adminstrationDeleteCheckbox'])->name('deleteAdminstration');
        Route::put('updateStatusAdminstration/{id}', [AdminstrationController::class, 'adminstrationUpdateStatus'])->name('adminstrationUpdateStatus');
        Route::get('searchAdminstration', [AdminstrationController::class, 'administrationSearch'])->name('searchAdminstration');
    });

    Route::middleware(['admin:administrationGroup'])->group(function () {
        Route::get('adminstrationGroup', [AdminstrationController::class, 'adminstrationGroup'])->name('adminstrationGroup');
        Route::get('addAdminstrationGroup', [AdminstrationController::class, 'adminstrationGroupAdd'])->name('addAdminstrationGroup');
        Route::post('add-AdminstrationGroup', [AdminstrationController::class, 'adminstrationGroupAdd'])->name('addFormAdminstrationGroup');
        Route::get('editAdminstrationGroup/{id}', [AdminstrationController::class, 'adminstrationGroupEdit'])->name('editAdminstrationGroup');
        Route::put('editAdminstrationGroup/{id}', [AdminstrationController::class, 'adminstrationGroupUpdate']);
        Route::post('deleteAdminstrationGroup', [AdminstrationController::class, 'adminstrationGroupDeleteCheckbox'])->name('deleteAdminstrationGroup');
    });

    Route::middleware(['admin:categoryArticle'])->group(function () {
        Route::get('categoryArticle', [CategoryArticleAdminController::class, 'categoryArticle'])->name('categoryArticle');
        Route::get('categoryArticleEdit/{id}', [CategoryArticleAdminController::class, 'categoryArticleEdit'])->name('categoryArticleEdit');
        Route::put('categoryArticleEdit/{id}', [CategoryArticleAdminController::class, 'categoryArticleEdit']);
        Route::get('categoryArticleAdd', [CategoryArticleAdminController::class, 'categoryArticleAdd'])->name('categoryArticleAdd');
        Route::post('categoryArticleAdd', [CategoryArticleAdminController::class, 'categoryArticleAdd'])->name('categoryArticleAdd');
        Route::post('/admin/category/article/bulk-delete', [CategoryArticleAdminController::class, 'bulkDelete'])->name('categoryArticleBulkDelete');
        Route::put('categories/update-status/{id}', [CategoryArticleAdminController::class, 'updateStatus'])->name('categoryUpdateStatus');
    });

    Route::middleware(['admin:article'])->group(function () {
        Route::get('article', [ArticleAdminController::class, 'article'])->name('article');
        Route::get('articleAdd', [ArticleAdminController::class, 'articleAdd'])->name('articleAdd');
        Route::post('articleAdd', [ArticleAdminController::class, 'articleAdd'])->name('articleAdd');
        Route::get('articleEdit/{id}', [ArticleAdminController::class, 'articleEdit'])->name('articleEdit');
        Route::put('articleEdit/{id}', [ArticleAdminController::class, 'articleEdit'])->name('articleEdit');
        Route::post('/admin/article/bulk-delete', [ArticleAdminController::class, 'articleBulkDelete'])->name('articleBulkDelete');
        Route::put('articles/update-status/{id}', [ArticleAdminController::class, 'updateStatusArticle'])->name('updateStatusArticle');
    });

    Route::middleware(['admin:user'])->group(function () {
        Route::get('userAdmin', [UserAdminController::class, 'userAdmin'])->name('userAdmin');
        Route::delete('user/delete/{id}', [UserAdminController::class, 'deleteUser'])->name('user.deleteUser');
        Route::get('user/add', [UserAdminController::class, 'userAdd'])->name('user.add');
        Route::post('user/store', [UserAdminController::class, 'userStore'])->name('user.store');
        Route::get('user/edit/{id}', [UserAdminController::class, 'userEdit'])->name('userEditAdmin');
        Route::put('user/update/{id}', [UserAdminController::class, 'userUpdate'])->name('user.update');
        Route::post('search-user', [UserAdminController::class, 'searchUser'])->name('searchUser');
        Route::put('update-status-user/{id}', [UserAdminController::class, 'userUpdateStatus'])->name('userUpdateStatus');
        Route::post('delete-checkbox-user', [UserAdminController::class, 'userDeleteCheckbox'])->name('checkboxDeleteUser');
    });


    Route::middleware(['admin:userGroup'])->group(function () {
        Route::get('userGroup', [UserAdminController::class, 'userGroup'])->name('userGroup');
    });

    Route::middleware(['admin:assembly'])->group(function () {
        Route::get('assembly', [AssemblyAdminController::class, 'assembly'])->name('assembly');
        Route::get('editAssembly/{id}', [AssemblyAdminController::class, 'assemblyEdit'])->name('editAssembly');
        Route::put('editAssembly/{id}', [AssemblyAdminController::class, 'assemblyUpdate']);
    });

    Route::middleware(['admin:employee'])->group(function () {
        Route::get('employee', [EmployeeAdminController::class, 'employee'])->name('employee');
        Route::get('editEmployee/{id}', [EmployeeAdminController::class, 'employeeEdit'])->name('editEmployee');
        Route::put('editEmployee/{id}', [EmployeeAdminController::class, 'employeeUpdate']);
    });

    Route::middleware(['admin:comment'])->group(function () {
        Route::get('comment', [CommentAdminController::class, 'comment'])->name('comment');
    });

    Route::middleware(['admin:order'])->group(function () {
        Route::get('order', [OrderAdminController::class, 'order'])->name('admin.order');
        Route::get('orderEdit/{id}', [OrderAdminController::class, 'orderEdit'])->name('admin.orderEdit');
        Route::post('orderUpdate/{id}', [OrderAdminController::class, 'orderUpdate'])->name('admin.orderUpdate'); // Thêm dòng này
        // Route::put('orderUpdateStatusAssembly/{id}', [OrderAdminController::class, 'orderUpdateStatusAssembly'])->name('orderUpdateStatusAssembly');
    });

    Route::middleware(['admin:category'])->group(function () {
        Route::get('category', [CategoryAdminController::class, 'category'])->name('category');
    });


    Route::middleware(['admin:coupon'])->group(function () {
        Route::get('coupon', [CouponAdminController::class, 'coupon'])->name('coupon');
    });

    Route::middleware(['admin:banner'])->group(function () {
        Route::get('banner', [BannerAdminController::class, 'banner'])->name('banner');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('adminLogout');
});