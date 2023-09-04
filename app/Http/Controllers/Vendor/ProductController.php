<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products;
        return view('vendor.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vendor.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        // move file to storage

        $image = Storage::disk('public')->put('/products', $request->file('image'));

        // create product

        $product = Product::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'price' => $request->price,
            'image' => $image,
            'quantity' => $request->quantity,
            'user_id' => auth()->id()
        ]);

        $product->categories()->attach($request->categories);

        // redirect to index
        return redirect()->route('products.index')->with('success', 'New product added');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('vendor.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = array_filter($request->safe()->toArray());

        $product->categories()->sync($data['categories']);

        if ($request->hasFile('image'))
        {
            if (Storage::disk('public')->exists($product->image)){
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = Storage::disk('public')->put('/products', $request->file('image'));
        }

        if (!empty($data)) $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated');
    }
    public function destroy(Product $product)
    {
        if (Storage::disk('public')->exists($product->image)){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted');
    }
}
