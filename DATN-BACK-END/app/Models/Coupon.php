<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_coupon',
        'code',
        'type',
        'total',
        'date_start',
        'date_end',
        'discount',
        'status'
    ];

    public function couponCheckCode($code)
    {
        return $this->where('code', $code)->where('status', 1)->first();
    }
}
