<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\PlayerController;
use App\Http\Controllers\Public\FixtureController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\AchievementController;
use App\Http\Controllers\Public\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/team', [PlayerController::class, 'index'])->name('players.index');
Route::get('/fixtures', [FixtureController::class, 'index'])->name('fixtures.index');
Route::get('/fixtures/{fixture}', [FixtureController::class, 'show'])->name('fixtures.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
