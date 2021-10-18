<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 // Cart route
 Route::group(['prefix'=>'cart'], function(){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::post('/store',[CartController::class,'store'])->name('cart.store');
    Route::post('/update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::post('/delete/{id}',[CartController::class,'destroy'])->name('cart.delete');
 });
