<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ItemController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('authors', AuthorController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('publishers', PublisherController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('items', ItemController::class);
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//web Routes//


 Route::get('/', [IndexController::class, 'home'])->name('index');
 Route::redirect('/index', '/');
Route::get('/product-list', [IndexController::class, 'productlist'])->name('product-list');
Route::get('/product', [IndexController::class, 'product'])->name('product');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');




require __DIR__.'/auth.php';
