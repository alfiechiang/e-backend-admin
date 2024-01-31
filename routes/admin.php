<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImgController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UploadImageController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::group([
    'middleware' => ['auth:admin'],
], function ($router) {
    Route::get('/menuList', [UserController::class, 'menuList']);
    Route::get('/product/category', [ProductCategoryController::class, 'pageList']);
    Route::post('/product/category', [ProductCategoryController::class, 'create']);
    Route::get('/product/category/{category_id}/findone', [ProductCategoryController::class, 'findone']);
    Route::put('/product/category/{category_id}', [ProductCategoryController::class, 'update']);
    Route::post('/product', [ProductController::class, 'create']);
    Route::get('/product', [ProductController::class, 'pageList']);
    Route::get('/product/{product_id}/findone', [ProductController::class, 'findone']);
    Route::put('/product/{product_id}', [ProductController::class, 'update']);
    Route::get('/product/img', [ProductImgController::class, 'list']);
    Route::get('/product/img/{img_id}/findone', [ProductImgController::class, 'findone']);
    Route::put('/product/img/{img_id}', [ProductImgController::class, 'update']);

});


Route::post('/product/img', [ProductImgController::class, 'create']);


Route::post('/uploadimg', [UploadImageController::class, 'exec']);

