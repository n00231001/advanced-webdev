<?php

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
    //Route::get('/guitars/{guitar}', [GuitarController::class, 'update'])->name('guitars.update');
    Route::get('/guitars/{guitar}', [GuitarController::class, 'show'])->name('guitars.show');

    Route::delete('/guitars/{guitar}', [GuitarController::class, 'destroy'])->name('guitars.destroy');
   /* Route::get('/guitars/create', [GuitarController::class, 'create'])->name('guitars.create');
    Route::post('/guitars', [GuitarController::class, 'store'])->name('guitars.store');
    Route::get('/guitars/{guitar}', [GuitarController::class, 'show'])->name('guitars.show');
    Route::put('/guitars/{guitar}', [GuitarController::class, 'update'])->name('guitars.update');*/





});

require __DIR__.'/auth.php';
