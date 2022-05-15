<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('index');
Route::get('/categories/{category_slug}', [App\Http\Controllers\frontend\HomeController::class, 'viewCategoryPost']);



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // All User Route
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('/edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('/edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    Route::get('/delete-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);

    // All Category Route 
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    
    // All Post Route
    Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('/add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('/add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('/edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('/edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'update']);

    Route::get('/delete-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);

});
