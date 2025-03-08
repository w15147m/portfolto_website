<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;






Route::get('/',  [PortfolioController::class, 'index'])->name('profile.edit');

Route::get('/dashboard', function () {
    return view('adminComponents.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{any}', function () {
    return view('adminComponents.index');
})->where('any', '^(?!api|login|register|password|email|logout|verify-email|confirm-password|forgot-password|reset-password).*$');
