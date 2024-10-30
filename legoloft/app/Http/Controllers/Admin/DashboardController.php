<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use App\Models\Product;
use App\Models\UserGroup;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\CategoryArticle;
use App\Models\AdministrationGroup;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Favourite;
use App\Models\Order;

class DashboardController extends Controller
{
    private $productModel;
    private $categoryModel;
    private $articleModel;
    private $categoryArticleModel;
    private $userModel;
    private $userGroupModel;
    private $administrationModel;
    private $administrationGroupModel;
    private $orderModel;
    private $favouriteModel;
    private $cartModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Categories();
        $this->userModel = new User();
        $this->articleModel = new Article();
        $this->categoryArticleModel = new CategoryArticle();
        $this->userModel = new User();
        $this->userGroupModel = new UserGroup();
        $this->administrationModel = new Administration();
        $this->administrationGroupModel = new AdministrationGroup();
        $this->orderModel = new Order();
        $this->favouriteModel = new Favourite();
        $this->cartModel = new Cart();
    }
    public function dashboard()
    {
        $countProduct = $this->productModel->countProductAll();
        $countCategory = $this->categoryModel->countCategoryAll();
        $countUserGroup = $this->userGroupModel->countUserGroupAll();
        $countUser = $this->userModel->countUserAll();
        $countArticle = $this->articleModel->countArticleAll();
        $countCategoryArticle = $this->categoryArticleModel->countCategoryArticleAll();
        $countAdministration = $this->administrationModel->countAdministrationAll();
        $countAdministrationGroup = $this->administrationGroupModel->countAdministrationGroupAll();

        $reportOrderData = $this->orderModel->reportOrder();
        $favouriteStatistical = $this->favouriteModel->statisticalFavouriteProducts();
        $cartStatistical = $this->cartModel->statisticalCarts();

        return view('admin.dashboard', compact(
            'countProduct',
            'countCategory',
            'countUser',
            'countArticle',
            'countCategoryArticle',
            'countUserGroup',
            'countAdministration',
            'countAdministrationGroup',
            'reportOrderData',
            'favouriteStatistical',
            'cartStatistical'
        ));
    }
}
