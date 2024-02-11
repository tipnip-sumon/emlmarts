<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaxController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin','index');
    Route::post('admin/auth','auth')->name('admin.auth');
});
Route::get('frontend/index',[FrontController::class,'index'])->name('frontend.index');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin/dashboard','dashboard');
        Route::get('admin/passwordupdate','passwordupdate');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/products-list','product_list');
        Route::get('admin/category','index');
        Route::get('admin/manage_category/{id}','manage_category');
        Route::post('admin/category','manage_category_update');
        Route::post('admin/insert0','insert')->name('admin.insert0');
        Route::get('admin/category/delete/{id}','delete');
        Route::get('admin/category/status/{status}/{id}','status');
    });
    
    Route::controller(CouponController::class)->group(function(){
        Route::get('admin/coupon-list','coupon_list');
        Route::get('admin/coupon','index');
        Route::get('admin/manage_coupon/{id}','manage_coupon');
        Route::post('admin/coupon','manage_coupon_update');
        Route::post('admin/insert1','insert')->name('admin.insert1');
        Route::get('admin/coupon/delete/{id}','delete');
        Route::get('admin/coupon/status/{status}/{id}','status');
    });
    Route::controller(SizeController::class)->group(function(){
        Route::get('admin/size-list','size_list');
        Route::get('admin/size','index');
        Route::get('admin/manage_size/{id}','manage_size');
        Route::post('admin/size','manage_size_update');
        Route::post('admin/insert2','insert')->name('admin.insert2');
        Route::get('admin/size/delete/{id}','delete');
        Route::get('admin/size/status/{status}/{id}','status');
        Route::get('admin/size/status/{status}/{id}','status_list');
    });
    Route::controller(ColorController::class)->group(function(){
        Route::get('admin/color-list','color_list');
        Route::get('admin/color','index');
        Route::get('admin/manage_color/{id}','manage_color');
        Route::post('admin/color','manage_color_update');
        Route::post('admin/insert3','insert')->name('admin.insert3');
        Route::get('admin/color/delete/{id}','delete');
        Route::get('admin/color/status/{status}/{id}','status');
        Route::get('admin/color/status/{status}/{id}','status_list');
    });
    Route::controller(TaxController::class)->group(function(){
        Route::get('admin/tax-list','tax_list');
        Route::get('admin/tax','index');
        Route::get('admin/manage_tax/{id}','manage_tax');
        Route::post('admin/tax','manage_tax_update');
        Route::post('admin/insert_tax','insert_tax')->name('admin.insert_tax');
        Route::get('admin/tax/delete/{id}','delete');
        Route::get('admin/tax/status/{status}/{id}','status_tax');
        Route::get('admin/tax/status/{status}/{id}','status_list');
    });
    Route::controller(BrandController::class)->group(function(){
        Route::get('admin/brand-list','brand_list');
        Route::get('admin/brand','index');
        Route::get('admin/manage_brand/{id}','manage_brand');
        Route::post('admin/brand','manage_brand_update');
        Route::post('admin/insert','insert')->name('admin.insert');
        Route::get('admin/brand/delete/{id}','delete');
        Route::get('admin/brand/status/{status}/{id}','status');
        Route::get('admin/brand/status/{status}/{id}','status_list');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/product','product_list');
        Route::get('admin/manage_products','index');
        Route::get('admin/edit_products/{id}','manage_products');
        Route::post('admin/edit_products','manage_product_update');
        Route::post('admin/insert4','insert')->name('admin.insert4');
        Route::get('admin/product/delete/{id}','delete');
        Route::get('admin/edit_products/delete/{id}/{pid}','attr_delete');
        Route::get('admin/edit_products_image/delete/{id}/{pid}','image_delete');
        Route::get('admin/product/status/{status}/{id}','status');
        Route::get('admin/product/status/{status}/{id}','status_list');
    });
    Route::get('admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('LOGIN_ID');
        session()->flash('errors','Successfully Logout');
        return redirect('admin');
    });
});
