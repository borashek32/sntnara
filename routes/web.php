<?php

use App\Http\Controllers\SiteController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'news'])->name('news');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contacts');
Route::get('/map', [SiteController::class, 'map'])->name('map');
Route::get('/documents', [SiteController::class, 'docs'])->name('docs');
Route::get('/reviews', [SiteController::class, 'reviews'])->name('reviews');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('dashboard/posts', Posts::class)->name('posts');
