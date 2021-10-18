<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminDistrictController;
use App\Http\Controllers\admin\AdminDivisionController;
use App\Http\Controllers\admin\AdminSliderController;
use App\Http\Controllers\admin\AdminBrandController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\CartController;
//use App\Http\Controllers\API\CartController;
use App\Http\Controllers\frontend\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/**
 * // frontend start
 */

//product
Route::get('/',[ProductController::class,'index'])->name('frontend.index');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('frontend.product.showDetails');
Route::get('/search',[ProductController::class,'search'])->name('frontend.product.search');
//category
Route::get('/category',[CategoryController::class,'index'])->name('frontend.category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('frontend.category.show');
//contact
Route::get('/contact',[ContactController::class,'index'])->name('frontend.contact.index');


 //user route
 Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile/update',[UserController::class,'profile_update'])->name('user.profile.update');
 });

 //Cart route
 Route::group(['prefix'=>'cart'], function(){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::post('/store',[CartController::class,'store'])->name('cart.store');
    Route::post('/update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::post('/delete/{id}',[CartController::class,'destroy'])->name('cart.delete');
 });

 //CheckOut route
 Route::group(['prefix'=>'checkout'], function(){
    Route::get('/',[CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/store',[CheckoutController::class,'store'])->name('checkout.store');

 });


 /**
  * backend start
  */

//admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

      //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create');
        Route::post('/store',[AdminProductController::class,'store'])->name('admin.product.store');
        Route::get('/show',[AdminProductController::class,'show'])->name('admin.product.show');
        Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
        Route::post('/update/{id}',[AdminProductController::class,'update'])->name('admin.product.update');
        Route::post('/destroy/{id}',[AdminProductController::class,'destroy'])->name('admin.product.destroy');
    });
     //Order Route
     Route::group(['prefix' => 'order'], function () {
        Route::get('/create',[AdminOrderController::class,'create'])->name('admin.order.create');
        Route::get('/show/{id}',[AdminOrderController::class,'show'])->name('admin.order.show');
        Route::post('/destroy/{id}',[AdminOrderController::class,'destroy'])->name('admin.order.destroy');
        Route::post('/completed/{id}',[AdminOrderController::class,'completed'])->name('admin.order.completed');
        Route::post('/paid/{id}',[AdminOrderController::class,'paid'])->name('admin.order.paid');
        Route::post('/charge-update/{id}',[AdminOrderController::class,'chargeUpdate'])->name('admin.order.charge');
        Route::get('/invoice/{id}',[AdminOrderController::class,'generateInvoice'])->name('admin.order.invoice');
    });
       //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/create',[AdminCategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[AdminCategoryController::class,'store'])->name('admin.category.store');
        Route::get('/show',[AdminCategoryController::class,'show'])->name('admin.category.show');
        Route::get('/edit/{id}',[AdminCategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/update/{id}',[AdminCategoryController::class,'update'])->name('admin.category.update');
        Route::post('/destroy/{id}',[AdminCategoryController::class,'destroy'])->name('admin.category.destroy');
    });

    //brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/create',[AdminBrandController::class,'create'])->name('admin.brand.create');
        Route::post('/store',[AdminBrandController::class,'store'])->name('admin.brand.store');
        Route::get('/show',[AdminBrandController::class,'show'])->name('admin.brand.show');
        Route::get('/edit/{id}',[AdminBrandController::class,'edit'])->name('admin.brand.edit');
        Route::post('/update/{id}',[AdminBrandController::class,'update'])->name('admin.brand.update');
        Route::post('/destroy/{id}',[AdminBrandController::class,'destroy'])->name('admin.brand.destroy');
    });
    //division
    Route::group(['prefix' => 'division'], function () {
        Route::get('/create',[AdminDivisionController::class,'create'])->name('admin.division.create');
        Route::post('/store',[AdminDivisionController::class,'store'])->name('admin.division.store');
        Route::get('/show',[AdminDivisionController::class,'show'])->name('admin.division.show');
        Route::get('/edit/{id}',[AdminDivisionController::class,'edit'])->name('admin.division.edit');
        Route::post('/update/{id}',[AdminDivisionController::class,'update'])->name('admin.division.update');
        Route::post('/destroy/{id}',[AdminDivisionController::class,'destroy'])->name('admin.division.destroy');
    });
     //district
     Route::group(['prefix' => 'district'], function () {
        Route::get('/create',[AdminDistrictController::class,'create'])->name('admin.district.create');
        Route::post('/store',[AdminDistrictController::class,'store'])->name('admin.district.store');
        Route::get('/show',[AdminDistrictController::class,'show'])->name('admin.district.show');
        Route::get('/edit/{id}',[AdminDistrictController::class,'edit'])->name('admin.district.edit');
        Route::post('/update/{id}',[AdminDistrictController::class,'update'])->name('admin.district.update');
        Route::post('/destroy/{id}',[AdminDistrictController::class,'destroy'])->name('admin.district.destroy');
    });
     //slider Route
     Route::group(['prefix' => 'slider'], function () {
        Route::get('/create',[AdminSliderController::class,'create'])->name('admin.slider.create');
        Route::post('/store',[AdminSliderController::class,'store'])->name('admin.slider.store');
        Route::get('/show',[AdminSliderController::class,'show'])->name('admin.slider.show');

        Route::post('/update/{id}',[AdminSliderController::class,'update'])->name('admin.slider.update');
        Route::post('/destroy/{id}',[AdminSliderController::class,'destroy'])->name('admin.slider.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//API Routes
Route::get('/get-district/{id}', function($id){
 return  json_encode(App\Models\District::where('division_id', $id)->get());
});
