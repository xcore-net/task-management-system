<?php

use App\Http\Controllers\AssigneeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\TaskTypeController;
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
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');
    Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    //form
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
    Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
    Route::get('/form/{id}', [FormController::class, 'show'])->name('form.show');
    Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');

    //field
    Route::get('/field', [FieldController::class, 'index'])->name('field.index');
    Route::get('/field/create', [FieldController::class, 'create'])->name('field.create');
    Route::post('/field', [FieldController::class, 'store'])->name('field.store');
    Route::get('/field/{id}', [FieldController::class, 'show'])->name('field.show');
    Route::get('/field/{id}/edit', [FieldController::class, 'edit'])->name('field.edit');
    Route::put('/field/{id}', [FieldController::class, 'update'])->name('field.update');
    Route::delete('/field/{id}', [FieldController::class, 'destroy'])->name('field.destroy');

    //Doc types
    Route::get('/documentType', [DocumentTypeController::class, 'index'])->name('documentType.index');
    Route::get('/documentType/create', [DocumentTypeController::class, 'create'])->name('documentType.create');
    Route::post('/documentType/store', [DocumentTypeController::class, 'store'])->name('documentType.store');
    Route::get('/documentType/{id}', [DocumentTypeController::class, 'show'])->name('documentType.show');
    Route::get('/documentType/{id}/edit', [DocumentTypeController::class, 'edit'])->name('documentType.edit');
    Route::put('/documentType/{id}', [DocumentTypeController::class, 'update'])->name('documentType.update');
    Route::delete('/documentType/{id}', [DocumentTypeController::class, 'destroy'])->name('documentType.destroy');

    //Doc request
    Route::get('/document_request', [DocumentRequestController::class, 'index'])->name('document_request.index');
    Route::get('/document_request/create', [DocumentRequestController::class, 'create'])->name('document_request.create');
    Route::post('/document_request/store', [DocumentRequestController::class, 'store'])->name('document_request.store');
    Route::get('/document_request/{id}', [DocumentRequestController::class, 'show'])->name('document_request.show');
    Route::get('/document_request/{id}/edit', [DocumentRequestController::class, 'edit'])->name('document_request.edit');
    Route::put('/document_request/{id}', [DocumentRequestController::class, 'update'])->name('document_request.update');
    Route::delete('/document_request/{id}', [DocumentRequestController::class, 'destroy'])->name('document_request.destroy');


    //Assignee
    Route::get('/assignee', [AssigneeController::class, 'index'])->name('assignee.index');
    Route::get('/assignee/create', [AssigneeController::class, 'create'])->name('assignee.create');
    Route::post('/assignee/store', [AssigneeController::class, 'store'])->name('assignee.store');
    Route::get('/assignee/{id}', [AssigneeController::class, 'show'])->name('assignee.show');
    Route::get('/assignee/{id}/edit', [AssigneeController::class, 'edit'])->name('assignee.edit');
    Route::put('/assignee/{id}', [AssigneeController::class, 'update'])->name('assignee.update');
    Route::delete('/assignee/{id}', [AssigneeController::class, 'destroy'])->name('assignee.destroy');
    
    //Task types
    Route::get('/taskType', [TaskTypeController::class, 'index'])->name('taskType.index');
    Route::get('/taskType/create', [TaskTypeController::class, 'create'])->name('taskType.create');
    Route::post('/taskType/store', [TaskTypeController::class, 'store'])->name('taskType.store');
    Route::get('/taskType/{id}', [TaskTypeController::class, 'show'])->name('taskType.show');
    Route::get('/taskType/{id}/edit', [TaskTypeController::class, 'edit'])->name('taskType.edit');
    Route::put('/taskType/{id}', [TaskTypeController::class, 'update'])->name('taskType.update');
    Route::delete('/taskType/{id}', [TaskTypeController::class, 'destroy'])->name('taskType.destroy');

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
});

require __DIR__ . '/auth.php';
