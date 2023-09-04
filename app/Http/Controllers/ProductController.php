<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function like(string $product)
    {
        if (
            auth()->user()->likes()->where('product_id', $product)->exists()
        ) {
            auth()->user()->likes()->detach($product);
            $like = false;
            $likes_count = Product::find($product)->likes->count();
        } else {
            auth()->user()->likes()->attach($product);
            $like = true;
            $likes_count = Product::find($product)->likes->count();
        }
        return response()->json([
            'liked' => $like,
            'count' => $likes_count
        ]);
    }

    public function addToCart(string $product)
    {
        // add for first

        auth()->user()->cart()->create([
            'product_id' => $product,
            'quantity' => 1
        ]);


        // increase count

        // calculate count
    }
}
