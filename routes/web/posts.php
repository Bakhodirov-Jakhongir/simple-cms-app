<?php

use Illuminate\Support\Facades\Route;



Route::get('/post/{post}' , [App\Http\Controllers\PostController::class , 'index'])->name('post');

Route::middleware(['auth'])->group(function() {

    Route::get('/posts/create' , [App\Http\Controllers\PostController::class , 'create'])->name('posts.create');

    Route::get('/posts/' , [App\Http\Controllers\PostController::class , 'index'])->name('posts.index');

    Route::post('/posts' , [App\Http\Controllers\PostController::class , 'store'])->name('posts.store');

    Route::get('/posts/{post}/edit' , [App\Http\Controllers\PostController::class , 'edit'])->name('posts.edit');

    Route::delete('/posts/{post}/destroy' , [App\Http\Controllers\PostController::class , 'destroy'])->name('posts.destroy');

    Route::patch('/posts/{post}/update' , [App\Http\Controllers\PostController::class , 'update'])->name('posts.update');

});


?>