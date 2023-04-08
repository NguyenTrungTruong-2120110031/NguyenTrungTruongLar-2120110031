<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\ProductController;

Route::get('/', [SiteController::class, 'index'])->name('site.home');

//khai báo route trang quản lý
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('brand', BrandController::class);
    //category
    Route::resource('category', CategoryController::class);
    Route::get('category_trash',[CategoryController::class, 'trash'])->name('category.trash');
    Route::prefix('admin')->group(function () {
        Route::get('status/{category}',[CategoryController::class, 'status'])->name('category.status');
        Route::get('delete/{category}',[CategoryController::class, 'delete'])->name('category.delete');
        Route::get('restore/{category}',[CategoryController::class, 'restore'])->name('category.restore');
        Route::get('destroy/{category}',[CategoryController::class, 'destroy'])->name('category.destroy');
    });
    //topic
    Route::resource('topic', TopicController::class);
    Route::get('topic_trash',[TopicController::class, 'trash'])->name('topic.trash');
    Route::prefix('admin')->group(function () {
        Route::get('status/{topic}',[TopicController::class, 'status'])->name('topic.status');
        Route::get('delete/{topic}',[TopicController::class, 'delete'])->name('topic.delete');
        Route::get('restore/{topic}',[TopicController::class, 'restore'])->name('topic.restore');
        Route::get('destroy/{topic}',[TopicController::class, 'destroy'])->name('topic.destroy');
    });
    //product
    Route::resource('product', ProductController::class);
    Route::get('product_trash',[ProductController::class, 'trash'])->name('product.trash');
    Route::prefix('admin')->group(function () {
        Route::get('status/{product}',[ProductController::class, 'status'])->name('product.status');
        Route::get('delete/{product}',[ProductController::class, 'delete'])->name('product.delete');
        Route::get('restore/{product}',[ProductController::class, 'restore'])->name('product.restore');
        Route::get('destroy/{product}',[ProductController::class, 'destroy'])->name('product.destroy');
    });
    Route::resource('product', ProductController::class);
});