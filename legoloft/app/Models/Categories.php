<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'description',
        'sort_order',
        'status',
        'parent_id'
    ];

    public function categories_children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id')->where('status', 1);
    }

    public function categoryAll()
    {
        return $this->orderBy('id', 'desc')->get();
    }

    public function categoryTotal()
    {
        return $this->whereNotNull('parent_id')->orderBy('id', 'desc')->get();
    }

    public function categoryChoose()
    {
        return $this->where('choose', 1)->orderBy('id', 'desc')->inRandomOrder()->limit(3)->get();
    }
}
