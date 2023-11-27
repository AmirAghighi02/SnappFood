<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\FoodTierController;
use App\Http\Controllers\admin\OffCodeController;
use App\Http\Controllers\admin\RestaurantTierController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::resources([
        'food' => FoodTierController::class,
        'restaurants' => RestaurantTierController::class
    ]);
    Route::resource('off', OffCodeController::class)->only([
        'index', 'show', 'create', 'store', 'destroy'
    ]);

    Route::get('/panel', [AdminController::class, 'panel'])->name('panel');

    Route::resource('comments', CommentController::class)->only('index','destroy');
    Route::post('comments/{comment}/cancel',[CommentController::class,'cancel'])->name('comments.cancel');
});
Route::redirect('/admin','/admin/panel');
