<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
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

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');


// <<============ ALL ROUTE FOR ADMIN ===============>>
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');

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
});
require __DIR__.'/auth.php';
