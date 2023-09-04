<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'desc', 'price', 'quantity', 'image', 'user_id'
    ];

    protected $appends = ['like_color'];

    public function getLikeColorAttribute() {

        return ( auth()->check() && auth()->user()->likes()->where('product_id', $this->id)->exists() )? 'red' : 'black';

    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
