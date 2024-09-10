<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Front\CartController as FrontCartController;
use App\Http\Controllers\Front\UserController as FrontUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PurchaseController as AdminPurchaseController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Front\PurchaseController;
use App\Http\Controllers\Front\StripeController;
use App\Models\Purchase;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('front')->name('front.')->group(function(){
    Route::middleware('auth')->group(function(){

        //payment Section
        Route::controller(StripeController::class)->group(function(){
            Route::get('stripe/{total_price}', 'stripe')->name('pay');
            Route::post('stripe/{total_price}', 'stripePost')->name('stripe');
        });

        Route::resource('purchases',PurchaseController::class)->only('index');

        //Users Section
        Route::resource('users',FrontUserController::class);

        //Cart
        Route::post('create_cart/{product_id}',[FrontCartController::class,'create_cart'])->name('create_cart');
        Route::resource('carts',FrontCartController::class)->only('index','destroy');
    });
});

Route::prefix('seller')->name('seller.')->group(function(){

    Route::resource('sellers',SellerController::class)->middleware('is_seller')->only('index');
    require __DIR__.'/sellerAuth.php';
});

Route::get('sold_products',[ProductController::class,'soldProduct'])->name('soldProduct')->middleware('check_admin_seller');
Route::resource('products',ProductController::class)->middleware('check_admin_seller')->except('show');

Route::prefix('back')->name('back.')->group(function(){
    Route::middleware('is_admin')->group(function(){

        //admin Section
        Route::controller(AdminController::class)->group(function(){
            Route::get('showAdmins',[AdminController::class,'showAdmins'])->name('showAdmins');
            Route::resource('admins',AdminController::class)->except('show','edit','update');
        });

        //Seller Section
        Route::get('showSellers',[SellerController::class,'showSellers'])->name('showSellers');
        Route::resource('sellers',SellerController::class)->except('index');

        //Products Section
        Route::resource('products',AdminProductController::class)->only('destroy','index');

        //roles section
        Route::resource('roles',RoleController::class);

        //User
        Route::resource('users',AdminUserController::class)->except('show','edit','update');

        //purchases
        Route::resource('purchases',AdminPurchaseController::class)->only('index');
    });

    //Auth Section
    require __DIR__.'/adminAuth.php';

});


require __DIR__.'/auth.php';
