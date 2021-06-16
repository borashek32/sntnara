<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Categories;
use App\Http\Livewire\CategoryOne;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Reviews;

// common routes
Route::get('/', [SiteController::class, 'news'])->name('news');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contacts');
Route::get('/map', [SiteController::class, 'map'])->name('map');
Route::get('/documents', [SiteController::class, 'docs'])->name('docs');
Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');
Route::get('/post/{id}', [PostController::class, 'post'])->name('post');
Route::post('/post/{id}', [PostController::class, 'addComment'])->name('comment');
Route::get('/news/category/{id}', CategoryOne::class)->name('category');

// admin routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('includes/dashboard');
})->name('dashboard');
Route::get('dashboard/posts', Posts::class)->name('posts');
Route::get('dashboard/post-edit/{id}', \App\Http\Livewire\PostEdit::class)->name('post-edit');
Route::get('dashboard/reviews', Reviews::class)->name('reviews-admin');
Route::get('dashboard/categories', Categories::class)->name('categories');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/sign-in/github', [\App\Http\Controllers\SocialController::class, 'github'])
        ->name('github');
    Route::get('/sign-in/github/redirect', [\App\Http\Controllers\SocialController::class, 'githubRedirect']);

    Route::get('/sign-in/facebook', [\App\Http\Controllers\SocialController::class, 'facebook'])
        ->name('facebook');
    Route::get('/sign-in/facebook/redirect', [\App\Http\Controllers\SocialController::class, 'facebookRedirect']);

    Route::get('/sign-in/google', [\App\Http\Controllers\SocialController::class, 'google'])
        ->name('google');
    Route::get('/sign-in/google/redirect', [\App\Http\Controllers\SocialController::class, 'googleRedirect']);

    Route::get('/sign-in/vkontakte', [\App\Http\Controllers\SocialController::class, 'vkontakte'])
        ->name('vkontakte');
    Route::get('/sign-in/vkontakte/redirect', [\App\Http\Controllers\SocialController::class, 'vkontakteRedirect']);
});
