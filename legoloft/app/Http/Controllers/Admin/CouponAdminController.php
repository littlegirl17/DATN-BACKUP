<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponAdminController extends Controller
{
    private $couponModel;

    public function __construct()
    {
        $this->couponModel = new Coupon();
    }

    public function coupon()
    {
        return view('admin.coupon');
    }
}