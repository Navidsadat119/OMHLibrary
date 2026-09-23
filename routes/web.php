<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/download/{volume?}', [BookController::class, 'download'])->name('books.download');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{author:slug}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/submit-book', [SubmissionController::class, 'create'])->name('submissions.create');
Route::post('/submit-book', [SubmissionController::class, 'store'])->name('submissions.store');

Route::view('/contact', 'home.contact')->name('contact');
Route::view('/privacy', 'home.legal')->name('privacy');
Route::view('/terms', 'home.legal')->name('terms');
