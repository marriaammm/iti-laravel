<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/posts/{id}/json', [PostController::class, 'show'])->name('posts.json');
