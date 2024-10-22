<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function favouriteFist($user_id, $product_id)
    {
        return $this->where('user_id', $user_id)->where('product_id', $product_id)->first();
    }

    public function favouriteGet($user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('id', 'desc')->paginate(4);
    }

    public function countFavourite($user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
}