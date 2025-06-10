<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/about', 'about')->name('about');

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index'])->name('welcome');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'storeContact'])->name('contact.store');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');

Route::get('/admin/add-product', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/add-product', [\App\Http\Controllers\Admin\ProductController::class, 'storeProduct'])->name('admin.products.store');
Route::get('/admin/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
