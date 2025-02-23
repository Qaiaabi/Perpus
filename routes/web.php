<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class, 'index']);

// Route untuk kategori
Route::get('/category_page', [AdminController::class, 'category_page']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/cat_delete/{id}', [AdminController::class, 'cat_delete']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('/update_category/{id}', [AdminController::class, 'update_category']);

// Route untuk buku
Route::get('/add_book', [AdminController::class, 'add_book']);
Route::post('/upload_book', [AdminController::class, 'upload_book']);
Route::get('/view_books', [AdminController::class, 'view_books'])->name('view_books');
Route::post('/delete_book/{id}', [AdminController::class, 'delete_book'])->name('delete_book');
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->name('edit_book');
Route::post('/update_book/{id}', [AdminController::class, 'update_book'])->name('update_book');
