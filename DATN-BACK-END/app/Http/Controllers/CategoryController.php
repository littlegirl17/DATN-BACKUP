<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;

class CategoryController extends Controller
{
    private $productModel;
    private $categoryModel;
    private $productDiscountModel;


    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Categories();
        $this->productDiscountModel = new ProductDiscount();
    }

    public function categoryAll()
    {
        $categoryAll = $this->categoryModel->categoryTotal();
        return view('totalCategory', compact('categoryAll'));
    }

    public function categoryProduct($id)
    {
        $categoryName = $this->categoryModel->findOrFail($id);
        $categoryAll = $this->categoryModel->categoryTotal();
        $productCategory = $this->productModel->productByCategory($id);
        $user = auth()->user();
        return view('categoryProduct', compact('categoryAll', 'productCategory', 'user', 'categoryName'));
    }
}
