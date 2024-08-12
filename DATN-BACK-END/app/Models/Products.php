<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'quantity',
        'category_id',
        'description',
        'price',
        'discount_price',
        'hot',
        'view',
        'outstanding',
        'status',
        'slug'
    ];

    // kết nối
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    } // 1 product thuộc về 1 danh mục

}
