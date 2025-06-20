<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;

use App\Http\Middleware\AdminCheckMiddleware;

use Illuminate\Support\Facades\Route;


Route::view('/about', 'about')->name('about');
Route::get('/', [HomepageController::class, 'index'])->name('welcome');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'storeContact'])->name('contact.store');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

    Route::get('/add-product', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct'])->name('admin.products.delete');
    Route::get('/products/{product}/edit', [ProductController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'updateProduct'])->name('admin.products.update');

    Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('admin.contacts.index');
    Route::delete('/delete-contact/{contact}', [ContactController::class, 'deleteContact'])->name('admin.contacts.delete');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'editContact'])->name('admin.contacts.edit');
    Route::put('/contacts/{contact}', [ContactController::class, 'updateContact'])->name('admin.contacts.update');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
