<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Reviews;

Route::get('/', [SiteController::class, 'news'])->name('news');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contacts');
Route::get('/map', [SiteController::class, 'map'])->name('map');
Route::get('/documents', [SiteController::class, 'docs'])->name('docs');
Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('dashboard/posts', Posts::class)->name('posts');
Route::get('dashboard/reviews', Reviews::class)->name('reviews-admin');
