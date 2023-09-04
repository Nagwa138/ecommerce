<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
//        $products = Product::all();
        return view('welcome' , compact('categories'));
    }

    public function search(Request $request)
    {
        $prducts = Product::where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('desc', 'LIKE', '%' . $request->search . '%')
            ->with('likes')
            ->get()
            ->toArray();

        return response()->json(['products' => $prducts]);
    }
}
