<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/books',BookController::class)->name('books.index');
    Route::post('/books',BookController::class);
    Route::get('/books/create', BookController::class);
    Route::get('/books/{book}/edit', BookController::class);
    Route::put('/books/{book}', BookController::class);
    Route::delete('/books/{book}', BookController::class);
        

    });

require __DIR__.'/auth.php';
