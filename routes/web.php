<?php

use App\Http\Controllers\CommunityLinkUserController;
use App\Http\Controllers\CommunityLinkController;
use App\Http\Controllers\ProfileController;
use App\Models\CommunityLink;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::post('/votes/{link}', [CommunityLinkUserController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('votes');

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('dashboard/{channel:slug}', [CommunityLinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
;

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/analytics', function () {
    return view('analytics');
})->middleware(['auth', 'verified'])->name('analytics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/myLinks', [CommunityLinkController::class, 'myLinks'])
    ->middleware(['auth', 'verified'])
    ->name('myLinks');

Route::get('myLinks/{channel:slug}', [CommunityLinkController::class, 'myLinks']);

require __DIR__ . '/auth.php';
