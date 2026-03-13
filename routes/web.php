<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderMasterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CompanyProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::post('/authors/delete/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');
    Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create');
    Route::post('/publishers/store', [PublisherController::class, 'store'])->name('publishers.store');
    Route::get('/publishers/edit/{id}', [PublisherController::class, 'edit'])->name('publishers.edit');
    Route::post('/publishers/update/{id}', [PublisherController::class, 'update'])->name('publishers.update');
    Route::post('/publishers/delete/{id}', [PublisherController::class, 'destroy'])->name('publishers.destroy');
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
    Route::post('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::post('/items/delete/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/orders', [OrderMasterController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderMasterController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderMasterController::class, 'store'])->name('orders.store');
    Route::get('/orders/edit/{id}', [OrderMasterController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/update/{id}', [OrderMasterController::class, 'update'])->name('orders.update');
    Route::post('/orders/delete/{id}', [OrderMasterController::class, 'destroy'])->name('orders.destroy');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::post('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/shippingaddress', [ShippingAddressController::class, 'index'])->name('shippingaddress.index');
    Route::get('/shippingaddress/create', [ShippingAddressController::class, 'create'])->name('shippingaddress.create');
    Route::post('/shippingaddress/store', [ShippingAddressController::class, 'store'])->name('shippingaddress.store');
    Route::get('/shippingaddress/edit/{id}', [ShippingAddressController::class, 'edit'])->name('shippingaddress.edit');
    Route::post('/shippingaddress/update/{id}', [ShippingAddressController::class, 'update'])->name('shippingaddress.update');
    Route::post('/shippingaddress/delete/{id}', [ShippingAddressController::class, 'destroy'])->name('shippingaddress.destroy');
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('banners.edit');
    Route::post('/banners/update/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::post('/banners/delete/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
    Route::post('/offers/store', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/offers/edit/{id}', [OfferController::class, 'edit'])->name('offers.edit');
    Route::post('/offers/update/{id}', [OfferController::class, 'update'])->name('offers.update');
    Route::post('/offers/delete/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');
    Route::get('/ads', [AdController::class,'index'])->name('ads.index');
    Route::post('/ads/store', [AdController::class,'store'])->name('ads.store');
    Route::post('/ads/update/{id}', [AdController::class,'update'])->name('ads.update');
    Route::post('/ads/delete/{id}', [AdController::class,'destroy'])->name('ads.destroy');
    Route::get('/profiles', [CompanyProfileController::class, 'index'])->name('profiles.index');
    Route::get('/profiles/create', [CompanyProfileController::class, 'create'])->name('profiles.create');
    Route::post('/profiles/store', [CompanyProfileController::class, 'store'])->name('profiles.store');
    Route::get('/profiles/edit/{id}', [CompanyProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/profiles/update/{id}', [CompanyProfileController::class, 'update'])->name('profiles.update');
    Route::post('/profiles/delete/{id}', [CompanyProfileController::class, 'destroy'])->name('profiles.destroy');
});




Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//web Routes//


 Route::get('/', [IndexController::class, 'home'])->name('index');
 Route::redirect('/index', '/');
Route::get('/product-list', [IndexController::class, 'productlist'])->name('product-list');
Route::get('/product/{slug}', [IndexController::class, 'product'])->name('product');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');




require __DIR__.'/auth.php';
