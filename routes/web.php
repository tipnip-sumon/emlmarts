<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/passwordupdate',[AdminController::class,'passwordupdate']);


    Route::get('admin/products-list',[CategoryController::class,'product_list']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category',[CategoryController::class,'manage_category_update']);
    Route::post('admin/insert',[CategoryController::class,'insert'])->name('admin.insert');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    Route::get('admin/coupon-list',[CouponController::class,'coupon_list']);
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon',[CouponController::class,'manage_coupon_update']);
    Route::post('admin/insert1',[CouponController::class,'insert'])->name('admin.insert1');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);

    
    Route::get('admin/size-list',[SizeController::class,'size_list']);
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('admin/size',[SizeController::class,'manage_size_update']);
    Route::post('admin/insert2',[SizeController::class,'insert'])->name('admin.insert2');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status_list']);

    Route::get('admin/color-list',[ColorController::class,'color_list']);
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('admin/color',[ColorController::class,'manage_color_update']);
    Route::post('admin/insert3',[ColorController::class,'insert'])->name('admin.insert3');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status_list']);

    Route::get('admin/product',[ProductController::class,'product_list']);
    Route::get('admin/manage_products',[ProductController::class,'index']);
    Route::get('admin/edit_products/{id}',[ProductController::class,'manage_products']);
    Route::post('admin/edit_products',[ProductController::class,'manage_product_update']);
    Route::post('admin/insert4',[ProductController::class,'insert'])->name('admin.insert4');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status_list']);

    Route::get('admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('LOGIN_ID');
        session()->flash('errors','Successfully Logout');
        return redirect('admin');
    });
});
