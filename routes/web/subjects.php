<?php

use Illuminate\Support\Facades\Route;

Route::get('/subjects' , [App\Http\Controllers\SubjectsController::class , 'index'])->name('subjects.index');

Route::get('/subjects/create' , [App\Http\Controllers\SubjectsController::class , 'create'])->name('subjects.create');

Route::get('/subjects/' , [App\Http\Controllers\SubjectsController::class , 'index'])->name('subjects.index');

Route::get('/subjects/{subject}/edit' , [App\Http\Controllers\SubjectsController::class , 'edit'])->name('subjects.edit');

Route::patch('/subjects/{subject}/update' , [App\Http\Controllers\SubjectsController::class , 'update'])->name('subjects.update');

Route::delete('/subjects/{subject}/destroy' , [App\Http\Controllers\SubjectsController::class , 'destroy'])->name('subjects.destroy');

?>