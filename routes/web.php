<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
    Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
    Route::get('/form/{id}', [FormController::class, 'show'])->name('form.show');

    Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::delete('/client/{id}', [ClientController::class, 'destory'])->name('client.destory');
});


require __DIR__ . '/auth.php';
