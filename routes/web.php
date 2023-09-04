<?php

use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('products/search', [HomeController::class, 'search'])->name('products.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('likes/{product}', [\App\Http\Controllers\ProductController::class, 'like'])->name('product.like');
    Route::get('cart', [ProfileController::class, 'cart'])->name('cart');
    Route::get('cart/{product}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
});

Route::middleware(['auth' , 'admin'])->group(function (){
    Route::resource('vendors', VendorController::class);
});

Route::middleware(['auth', 'vendor'])->group(function (){
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
