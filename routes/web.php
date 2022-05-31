<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

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

// <<============ ALL ROUTE FOR HOME ===============>>
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/user-login', [FrontendController::class, 'user_login'])->name('frontend.user_login');
Route::get('/user-register', [FrontendController::class, 'user_register'])->name('frontend.user_register');


// <<============ ALL ROUTE FOR ADMIN ===============>>
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');

     // VENDOY ROUTE LIST
    Route::group(['prefix' => 'vendor'], function() {
        Route::get('/',[ VendorController::class, 'index' ])->name('vendor.index');
        Route::get('/create',[ VendorController::class, 'create' ])->name('vendor.create');
        Route::post('/',[ VendorController::class, 'store' ])->name('vendor.store');
        Route::get('/show/{id}',[ VendorController::class, 'show' ])->name('vendor.show');
        Route::get('/edit/{id}',[ VendorController::class, 'edit' ])->name('vendor.edit');
        Route::put('/{id}',[ VendorController::class, 'update' ])->name('vendor.update');
        Route::get('/delete/{id}',[ VendorController::class, 'destroy' ])->name('vendor.destroy');

        Route::get('/active/{id}',[ VendorController::class, 'active_status' ])->name('vendor.active');
        Route::get('/deactive/{id}',[ VendorController::class, 'deactive_status' ])->name('vendor.deactive');
    });

    // CATEGORY ROUTE LIST
    Route::group(['prefix' => 'category'], function() {
        Route::get('/',[ CategoryController::class, 'index' ])->name('category.index');
        Route::get('/create',[ CategoryController::class, 'create' ])->name('category.create');
        Route::post('/',[ CategoryController::class, 'store' ])->name('category.store');
        Route::get('/edit/{slug}',[ CategoryController::class, 'edit' ])->name('category.edit');
        Route::put('/{slug}',[ CategoryController::class, 'update' ])->name('category.update');
        Route::get('/delete/{slug}',[ CategoryController::class, 'destroy' ])->name('category.destroy');

        Route::get('/active/{slug}',[ CategoryController::class, 'active_status' ])->name('category.active');
        Route::get('/deactive/{slug}',[ CategoryController::class, 'deactive_status' ])->name('category.deactive');
    });

    // SUB CATEGORY ROUTE LIST
    Route::group(['prefix' => 'sub-category'], function() {
        Route::get('/',[ SubCategoryController::class, 'index' ])->name('sub-category.index');
        Route::get('/create',[ SubCategoryController::class, 'create' ])->name('sub-category.create');
        Route::post('/',[ SubCategoryController::class, 'store' ])->name('sub-category.store');
        Route::get('/edit/{slug}',[ SubCategoryController::class, 'edit' ])->name('sub-category.edit');
        Route::put('/{slug}',[ SubCategoryController::class, 'update' ])->name('sub-category.update');
        Route::get('/delete/{slug}',[ SubCategoryController::class, 'destroy' ])->name('sub-category.destroy');

        Route::get('/active/{slug}',[ SubCategoryController::class, 'active_status' ])->name('sub-category.active');
        Route::get('/deactive/{slug}',[ SubCategoryController::class, 'deactive_status' ])->name('sub-category.deactive');
    });

    // SLIDER ROUTE LIST
    Route::group(['prefix' => 'slider'], function() {
        Route::get('/',[ SliderController::class, 'index' ])->name('slider.index');
        Route::get('/create',[ SliderController::class, 'create' ])->name('slider.create');
        Route::post('/',[ SliderController::class, 'store' ])->name('slider.store');
        Route::get('/edit/{id}',[ SliderController::class, 'edit' ])->name('slider.edit');
        Route::put('/{id}',[ SliderController::class, 'update' ])->name('slider.update');
        Route::get('/delete/{id}',[ SliderController::class, 'destroy' ])->name('slider.destroy');

        Route::get('/active/{id}',[ SliderController::class, 'active_status' ])->name('slider.active');
        Route::get('/deactive/{id}',[ SliderController::class, 'deactive_status' ])->name('slider.deactive');
    });

    // PRODUCT ROUTE LIST
    Route::group(['prefix' => 'product'], function() {
        Route::get('/',[ ProductController::class, 'index' ])->name('product.index');
        Route::get('/create',[ ProductController::class, 'create' ])->name('product.create');
        Route::post('/',[ ProductController::class, 'store' ])->name('product.store');
        Route::get('/show/{slug}',[ ProductController::class, 'show' ])->name('product.show');
        Route::get('/edit/{slug}',[ ProductController::class, 'edit' ])->name('product.edit');
        Route::put('/{slug}',[ ProductController::class, 'update' ])->name('product.update');
        Route::get('/delete/{slug}',[ ProductController::class, 'destroy' ])->name('product.destroy');

        Route::get('/active/{slug}',[ ProductController::class, 'active_status' ])->name('product.active');
        Route::get('/deactive/{slug}',[ ProductController::class, 'deactive_status' ])->name('product.deactive');

        // Get ajax Data For Sub Category
        Route::post('/get-product-sub-category',[ ProductController::class, 'get_sub_category' ]);
        // Single Product Gallery Image Delete
        Route::get('/gallery/{id}',[ ProductController::class, 'gallery_image' ])->name('product.gallery.image');

    });
});
require __DIR__.'/auth.php';
