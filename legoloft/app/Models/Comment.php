<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'rating',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productReview($detail)
    {
        return $this->where('product_id', $detail->id)->paginate(4);
    }

    public function productCountReview($detail)
    {
        return $this->where('product_id', $detail->id)->count();
    }
}
