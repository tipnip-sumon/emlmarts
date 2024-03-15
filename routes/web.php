<?php

use App\Models\Brand;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\frontend\FrontController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin','index');
    Route::post('admin/auth','auth')->name('admin.auth');
});


Route::controller(FrontController::class)->group(function(){
    Route::get('/','index')->name('frontend.index');
    Route::post('add_to_cart','add_to_cart');
    Route::get('cart','cart')->name('frontend.cart');
    Route::get('product/{slag}','product');
    Route::get('category/{id}','category');
    Route::get('search/{str}','search');
    Route::get('email_verification/{id}','email_verification');
    // group middleware
    Route::group(['middleware'=>'login_auth'],function(){
        Route::get('login','login');
        Route::get('register','register');
    });
    // route middleware
    // Route::get('login','login')->middleware('login_auth');
    // Route::get('register','register')->middleware('login_auth');
    Route::post('register_process','register_process')->name('register.register_process');
    Route::post('login_process','login_process')->name('login.login_process');
    Route::post('forgot_process','forgot_process')->name('forgot_process');
    Route::get('reset_password/{data}','reset_password');
    Route::post('forgot_password_verify','forgot_password_verify');
    // Route::post('forgot_password_verify/{id}','forgot_password_verify');

});


Route::get('logout',function(){
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    session()->flash('errors','Successfully Logout');
    return redirect('/');
});


Route::controller(SubscribeController::class)->group(function(){
    Route::post('frontend/subscribe','store')->name('frontend/subscribe');
});

Route::group(['middleware'=>'admin_auth','prefix'=> 'admin'],function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/dashboard','dashboard');
        Route::get('/passwordupdate','passwordupdate');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/products-list','product_list');
        Route::get('/category','index');
        Route::get('/manage_category/{id}','manage_category');
        Route::post('/category','manage_category_update');
        Route::post('/insert0','insert')->name('admin.insert0');
        Route::get('/category/delete/{id}','delete');
        Route::get('/category/status/{status}/{id}','status');
    });
    
    Route::controller(CouponController::class)->group(function(){
        Route::get('/coupon-list','coupon_list');
        Route::get('/coupon','index');
        Route::get('/manage_coupon/{id}','manage_coupon');
        Route::post('/coupon','manage_coupon_update');
        Route::post('/insert1','insert')->name('admin.insert1');
        Route::get('/coupon/delete/{id}','delete');
        Route::get('/coupon/status/{status}/{id}','status');
    });
    Route::controller(SizeController::class)->group(function(){
        Route::get('/size-list','size_list');
        Route::get('/size','index');
        Route::get('/manage_size/{id}','manage_size');
        Route::post('/size','manage_size_update');
        Route::post('/insert2','insert')->name('admin.insert2');
        Route::get('/size/delete/{id}','delete');
        Route::get('/size/status/{status}/{id}','status');
        Route::get('/size/status/{status}/{id}','status_list');
    });
    Route::controller(ColorController::class)->group(function(){
        Route::get('/color-list','color_list');
        Route::get('/color','index');
        Route::get('/manage_color/{id}','manage_color');
        Route::post('/color','manage_color_update');
        Route::post('/insert3','insert')->name('admin.insert3');
        Route::get('/color/delete/{id}','delete');
        Route::get('/color/status/{status}/{id}','status');
        Route::get('/color/status/{status}/{id}','status_list');
    });
    Route::controller(TaxController::class)->group(function(){
        Route::get('/tax-list','tax_list');
        Route::get('/tax','index');
        Route::get('/manage_tax/{id}','manage_tax');
        Route::post('/tax','manage_tax_update');
        Route::post('/insert_tax','insert_tax')->name('admin.insert_tax');
        Route::get('/tax/delete/{id}','delete');
        Route::get('/tax/status/{status}/{id}','status_tax');
        Route::get('/tax/status/{status}/{id}','status_list');
    });
    Route::controller(BrandController::class)->group(function(){
        Route::get('/brand-list','brand_list');
        Route::get('/brand','index');
        Route::get('/manage_brand/{id}','manage_brand');
        Route::post('/brand','manage_brand_update');
        Route::post('/insert','insert')->name('admin.insert');
        Route::get('/brand/delete/{id}','delete');
        Route::get('/brand/status/{status}/{id}','status');
        Route::get('/brand/status/{status}/{id}','status_list');
    });
    Route::controller(UserController::class)->group(function(){
        Route::get('/user-list','show');
        Route::get('/user','index');
        Route::get('/user/status/{status}/{id}','status');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','product_list');
        Route::get('/manage_products','index');
        Route::get('/edit_products/{id}','manage_products');
        Route::post('/edit_products','manage_product_update');
        Route::post('/insert4','insert')->name('admin.insert4');
        Route::get('/product/delete/{id}','delete');
        Route::get('/edit_products/delete/{id}/{pid}','attr_delete');
        Route::get('/edit_products_image/delete/{id}/{pid}','image_delete');
        Route::get('/product/status/{status}/{id}','status');
        Route::get('/product/status/{status}/{id}','status_list');
    });
    Route::controller(HomeBannerController::class)->group(function(){
        Route::get('/homebanner','homebanner_list');
        Route::get('/homebanner','index');
        Route::get('/manage_banner/{id}','manage_banner');
        Route::post('/edit_homebanner','manage_homebanner_update');
        Route::post('/insert_banner','insert_banner')->name('admin.insert_banner');
        Route::get('/homebanner/delete/{id}','delete');
        Route::get('/edit_homebanner/delete/{id}/{pid}','attr_delete');
        Route::get('/edit_homebanner_image/delete/{id}/{pid}','image_delete');
        Route::get('/homebanner/status/{status}/{id}','status');
    });
    Route::get('/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('LOGIN_ID');
        session()->flash('errors','Successfully Logout');
        return redirect('admin');
    });
    
});
