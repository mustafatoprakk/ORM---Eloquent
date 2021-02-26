<?php

use Illuminate\Support\Facades\Route;
use App\Models\BookModel;
use App\Http\Controllers\BookController;



Route::get('show', [BookController::class, 'create'])->name('show');

Route::get('insertGet', [BookController::class, 'index'])->name('insertGet');
Route::post('insertPost', [BookController::class, 'store'])->name('insertPost');

Route::get('updateGet/{id}', [BookController::class, 'edit'])->name('updateGet');
Route::post('updatePost/{id}', [BookController::class, 'update'])->name('updatePost');

Route::get('delete/{id}',[BookController::class,'destroy'])->name('delete');
