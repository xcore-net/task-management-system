<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\DocumentTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    //client
    Route::get('/client', [ClientController::class, 'index'])->name(
        'client.index'
    );
    Route::get('/client/create', [ClientController::class, 'create'])->name(
        'client.create'
    );
    Route::post('/client/store', [ClientController::class, 'store'])->name(
        'client.store'
    );
    Route::get('/client/{id}', [ClientController::class, 'show'])->name(
        'client.show'
    );
    Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name(
        'client.edit'
    );
    Route::put('/client/{id}', [ClientController::class, 'update'])->name(
        'client.update'
    );
    Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name(
        'client.destroy'
    );

    //form
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::get('/form/create', [FormController::class, 'create'])->name(
        'form.create'
    );
    Route::post('/form/store', [FormController::class, 'store'])->name(
        'form.store'
    );
    Route::get('/form/{id}', [FormController::class, 'show'])->name(
        'form.show'
    );

    Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name(
        'form.edit'
    );
    Route::put('/form/{id}', [FormController::class, 'update'])->name(
        'form.update'
    );
    Route::delete('/form/{id}', [FormController::class, 'destroy'])->name(
        'form.destroy'
    );

    Route::get('/field', [FieldController::class, 'index'])->name(
        'field.index'
    );
    Route::get('/field/create', [FieldController::class, 'create'])->name(
        'field.create'
    );
    Route::post('/field', [FieldController::class, 'store'])->name(
        'field.store'
    );
    Route::get('/field/{id}', [FieldController::class, 'show'])->name(
        'field.show'
    );

    Route::get('/field/{id}/edit', [FieldController::class, 'edit'])->name(
        'field.edit'
    );
    Route::put('/field/{id}', [FieldController::class, 'update'])->name(
        'field.update'
    );
    Route::delete('/field/{id}', [FieldController::class, 'destroy'])->name(
        'field.destroy'
    );

    //Doc types
    Route::get('/documentType', [DocumentTypeController::class, 'index'])->name(
        'documentType.index'
    );
    Route::get('/documentType/create', [
        DocumentTypeController::class,
        'create',
    ])->name('documentType.create');

    Route::post('/documentType/store', [
        DocumentTypeController::class,
        'store',
    ])->name('documentType.store');

    Route::get('/documentType/{id}', [
        DocumentTypeController::class,
        'show',
    ])->name('documentType.show');

    Route::get('/documentType/{id}/edit', [
        DocumentTypeController::class,
        'edit',
    ])->name('documentType.edit');

    Route::put('/documentType/{id}', [
        DocumentTypeController::class,
        'update',
    ])->name('documentType.update');
    
    Route::delete('/documentType/{id}', [
        DocumentTypeController::class,
        'destroy',
    ])->name('documentType.destroy');

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

Route::middleware('auth')->group(function () {});

require __DIR__ . '/auth.php';
