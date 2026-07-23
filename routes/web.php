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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HsnController;
use App\Http\Controllers\VarientsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
     Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
   

    Route::get('/hsn', [HsnController::class, 'index'])->name('hsn.index');
    Route::get('/hsn/create', [HsnController::class, 'create'])->name('hsn.create');
    Route::post('/hsn/store', [HsnController::class, 'store'])->name('hsn.store');
    Route::get('/hsn/edit/{id}', [HsnController::class, 'edit'])->name('hsn.edit');
    Route::post('/hsn/update/{id}', [HsnController::class, 'update'])->name('hsn.update');
    Route::post('/hsn/delete/{id}', [HsnController::class, 'destroy'])->name('hsn.destroy');

    Route::get('/varients', [VarientsController::class, 'index'])->name('varients.index');
    Route::get('/varients/create', [VarientsController::class, 'create'])->name('varients.create');
    Route::post('/varients/store', [VarientsController::class, 'store'])->name('varients.store');
    Route::get('/varients/edit/{id}', [VarientsController::class, 'edit'])->name('varients.edit');
    Route::post('/varients/update/{id}', [VarientsController::class, 'update'])->name('varients.update');
    Route::get('/varients/delete/{id}', [VarientsController::class, 'destroy'])->name('varients.delete');


    Route::any('/attributes/{id}', [VarientsController::class, 'attributes'])->name('attributes');
    Route::post('/addattributes', [VarientsController::class, 'add_attributes'])->name('addattributes');
    Route::post('/editattributes/{id}', [VarientsController::class, 'edit_attributes'])->name('editattributes');
    Route::get('/attributedestroy/{id}', [VarientsController::class, 'attributedestroy'])->name('attributedestroy');


    Route::get('/get-attributes/{id}', [VarientsController::class, 'getAttributes']);
   Route::get('/get-productattributes/{id}', [VarientsController::class, 'getProductattributes']);
    Route::get('/edititems/{id}', [ItemController::class, 'edititems']);
  
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('/authors/delete/{id}', [AuthorController::class, 'destroy'])->name('authors.delete');


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
    Route::get('/items/delete/{id}', [ItemController::class, 'destroy'])->name('items.delete');


    Route::get('/orders', [OrderMasterController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderMasterController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderMasterController::class, 'store'])->name('orders.store');
    Route::get('/orders/edit/{id}', [OrderMasterController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/update/{id}', [OrderMasterController::class, 'update'])->name('orders.update');
    Route::post('/orders/delete/{id}', [OrderMasterController::class, 'destroy'])->name('orders.destroy');
    Route::post('/updateStatus', [OrderMasterController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::post('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/shippingaddress/{id}', [ShippingAddressController::class, 'index'])->name('shippingaddress.index');
    Route::post('/shippingaddress/create', [ShippingAddressController::class, 'create'])->name('shippingaddress.create');
    Route::post('/shippingaddress/store', [ShippingAddressController::class, 'store'])->name('shippingaddress.store');
    Route::get('/shippingaddress/edit/{id}', [ShippingAddressController::class, 'edit'])->name('shippingaddress.edit');
    Route::post('/shippingaddress/update/{id}', [ShippingAddressController::class, 'update'])->name('shippingaddress.update');
    Route::post('/shippingaddress/delete/{id}', [ShippingAddressController::class, 'destroy'])->name('shippingaddress.destroy');
    
    Route::get('/banner', [BannerController::class, 'banners'])->name('banner');
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
  
    Route::post('/profiles/update', [CompanyProfileController::class, 'update'])->name('profiles.update');
    Route::post('/profiles/delete/{id}', [CompanyProfileController::class, 'destroy'])->name('profiles.destroy');
    Route::post('/getAddrees', [OrderMasterController::class, 'getAddrees'])->name('getAddrees');
    

    
});




Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//web Routes//


Route::get('/', [IndexController::class, 'home'])->name('index');
Route::redirect('/index', '/');
Route::get('/gaming-products/{id}', [IndexController::class, 'gamingProducts'])->name('gaming.products');
Route::get('/gaming-product-detail/{slug}', [IndexController::class, 'gamingProductDetail'])->name('gaming.product');
Route::get('/productlist/{id}', [IndexController::class, 'productlist'])->name('product-list');
Route::get('/product/{slug}', [IndexController::class, 'product'])->name('product');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::get('/search-customers', [PageController::class, 'search'])
    ->name('search.customers');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/term-conditions', [PageController::class, 'termconditions'])->name('term-conditions');
Route::get('/refund', [PageController::class, 'refund'])->name('refund');

Route::get('/cart', [OrderController::class, 'cart'])->name('cart');

Route::post('/save-guest-cart', [OrderController::class, 'saveGuestCart'])
    ->name('saveGuestCart');

Route::middleware('customer')->group(function () {

Route::get('/shipping_details', [OrderController::class, 'shipping_details'])->name('shipping_details');
Route::post('/addshippingaddress', [OrderController::class, 'addshippingaddress'])->name('addshippingaddress');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/success', [OrderController::class, 'success'])->name('success');
Route::get('/userprofile', [CustomerController::class, 'userprofile'])->name('userprofile');
Route::post('/changeqty', [OrderController::class, 'changeqty'])->name('changeqty');
Route::get('/orderview/{id}', [OrderController::class, 'orderview'])->name('orderview');

});


Route::post('/add-to-cart', [OrderController::class, 'addtocart'])->name('add-to-cart');
Route::get('/userlogin', [CustomerController::class, 'login'])->name('userlogin');
Route::get('/user_registration', [CustomerController::class, 'user_registration'])->name('user_registration');
Route::post('/uregister', [CustomerController::class, 'uregister'])->name('uregister');
Route::post('/signin', [CustomerController::class, 'signin'])->name('signin');
Route::get('/forget_password', [AuthController::class, 'forget_password'])->name('forget_password');
Route::post('/reset', [AuthController::class, 'reset'])->name('reset');


Route::post('/payment-success-razorpay', [OrderController::class, 'paymentSuccesswithrazorpay']);

Route::get('/payment-success',[OrderController::class, 'paymentSuccess'])->name('payment.success');

Route::get('/register', [CustomerController::class, 'login'])->name('userlogin');

Route::post('/save-cart-session', function (Illuminate\Http\Request $request) {
    session()->put('cart_product_id', $request->product_id);

    return response()->json([
        'status' => true
    ]);
});

Route::post('/merge-cart', [CustomerController::class, 'mergeCart']);

Route::get('/reset-password/{token}', function ($token, Request $request) {

    if (!$request->has('email')) {
        abort(404, 'Email missing in reset link');
    }

    return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->email
    ]);

})->name('password.reset');






require __DIR__.'/auth.php';
