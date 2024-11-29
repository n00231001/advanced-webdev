<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuitarController;

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

    Route::get('/guitars', [GuitarController::class, 'index'])->name('guitars.index');
    Route::get('/guitars/create', [GuitarController::class, 'create'])->name('guitars.create');
    Route::get('/guitars/{guitar}', [GuitarController::class, 'show'])->name('guitars.show');
    Route::post('/guitars', [GuitarController::class, 'store'])->name('guitars.store');
    Route::get('/guitars/{guitar}/edit', [GuitarController::class, 'edit'])->name('guitars.edit');
    Route::put('/guitars/{guitar}', [GuitarController::class, 'update'])->name('guitars.update');
    Route::get('/guitars/{guitar}', [GuitarController::class, 'show'])->name('guitars.show');

    Route::delete('/guitars/{guitar}', [GuitarController::class, 'destroy'])->name('guitars.destroy');
   /* Route::get('/guitars/create', [GuitarController::class, 'create'])->name('guitars.create');
    Route::post('/guitars', [GuitarController::class, 'store'])->name('guitars.store');
    Route::get('/guitars/{guitar}', [GuitarController::class, 'show'])->name('guitars.show');
    Route::put('/guitars/{guitar}', [GuitarController::class, 'update'])->name('guitars.update');*/
    Route::resource('reviews', ReviewController::class);
    Route::post('guitars/{guitar}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    //Route::post('guitars/{guitar}/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');

    Route::resource('Artist', ArtistController::class)->middleware('auth');
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::put('/artits/{artist}', [ArtistController::class, 'update'])->name('artist.update');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::get('/artists/{artist}', [GuitarController::class, 'show'])->name('artists.show');
    Route::get('/artists/{artist}/edit', [GuitarController::class, 'edit'])->name('artists.edit');
    Route::delete('/artists/{artist}', [GuitarController::class, 'destroy'])->name('artists.destroy');
});

require __DIR__.'/auth.php';
