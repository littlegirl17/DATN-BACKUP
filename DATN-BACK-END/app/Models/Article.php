<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryArticle_id',
        'title',
        'image',
        'description_short',
        'description',
        'status'
    ];
   
    public function category() {
        return $this->belongsTo(CategoryArticle::class, 'categoryArticle_id');
    }
    public function categoryArticle()
{
    return $this->belongsTo(CategoryArticle::class, 'categoryArticle_id');
}
}