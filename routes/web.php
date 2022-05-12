<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

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

});
