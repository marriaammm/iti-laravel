<?php

use App\Http\Controllers\InerrtiaPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts/archived', [InerrtiaPostController::class, 'archived'])->name('posts.archived');
Route::resource('posts', InerrtiaPostController::class);
Route::delete('/posts/{id}/force', [InerrtiaPostController::class, 'forceDestroy'])->name('posts.forceDestroy');
Route::patch('/posts/{id}/restore', [InerrtiaPostController::class, 'restore'])->name('posts.restore');