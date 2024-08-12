<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'sort_order',
        'status',
        'slug',
        'parent_id'
    ];


    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    } //1 category có nhiều product

    public function categories_children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    } // 1 category có nhiều danh mục con
}
