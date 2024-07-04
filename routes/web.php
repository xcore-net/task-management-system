<?php

use App\Http\Controllers\FieldController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');
        Route::delete('/field/{id}', [FieldController::class, 'destroy'])->name('field.destroy');
    });

    Route::middleware(['role:admin|user'])->group(function () {
        Route::get('/form', [FormController::class, 'index'])->name('form.index');
        Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
        Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
        Route::get('/form/{id}', [FormController::class, 'show'])->name('form.show');
        Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
        Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');


        Route::get('/field', [FieldController::class, 'index'])->name('field.index');
        Route::get('/field/create', [FieldController::class, 'create'])->name('field.create');
        Route::post('/field/store', [FieldController::class, 'store'])->name('field.store');
        Route::get('/field/{id}', [FieldController::class, 'show'])->name('field.show');
        Route::get('/field/{id}/edit', [FieldController::class, 'edit'])->name('field.edit');
        Route::put('/field/{id}', [FieldController::class, 'update'])->name('field.update');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
