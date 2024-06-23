<?php

use App\Http\Controllers\Api\ApiDocumentRequestController;
use App\Http\Controllers\Api\ApiFormController;
use App\Http\Controllers\Api\ApiTaskController;
use App\Http\Controllers\Api\ApiTaskTypeController;
use App\Http\Controllers\Api\ApiUploadedFilesController;
use App\Http\Controllers\ApiDocumentTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Form
Route::get('/form', [ApiFormController::class, 'index']);
Route::post('/form/store', [ApiFormController::class, 'store']);
Route::get('/form/{id}', [ApiFormController::class, 'show']);
Route::put('/form/{id}', [ApiFormController::class, 'update']);
Route::delete('/form/{id}', [ApiFormController::class, 'destroy']);

//Uploded Files
Route::get('/uploaded_files', [ApiUploadedFilesController::class, 'index'])->name('uploaded_files.index');
Route::post('/uploaded_files/store', [ApiUploadedFilesController::class, 'store'])->name('uploaded_files.store');
Route::get('/uploaded_files/{id}', [ApiUploadedFilesController::class, 'show'])->name('uploaded_files.show');
Route::put('/uploaded_files/{id}', [ApiUploadedFilesController::class, 'update'])->name('uploaded_files.update');
Route::delete('/uploaded_files/{id}', [ApiUploadedFilesController::class, 'destroy'])->name('uploaded_files.destroy');

//Task types
Route::get('/taskType', [ApiTaskTypeController::class, 'index'])->name('taskType.index');
Route::post('/taskType/store', [ApiTaskTypeController::class, 'store'])->name('taskType.store');
Route::get('/taskType/{id}', [ApiTaskTypeController::class, 'show'])->name('taskType.show');
Route::put('/taskType/{id}', [ApiTaskTypeController::class, 'update'])->name('taskType.update');
Route::delete('/taskType/{id}', [ApiTaskTypeController::class, 'destroy'])->name('taskType.destroy');

//Task
Route::get('/task', [ApiTaskController::class, 'index'])->name('task.index');
Route::post('/task/store', [ApiTaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}', [ApiTaskController::class, 'show'])->name('task.show');
Route::put('/task/{id}', [ApiTaskController::class, 'update'])->name('task.update');
Route::delete('/task/{id}', [ApiTaskController::class, 'destroy'])->name('task.destroy');

//Doc request
Route::get('/document_request', [ApiDocumentRequestController::class, 'index'])->name('document_request.index');
Route::post('/document_request/store', [ApiDocumentRequestController::class, 'store'])->name('document_request.store');
Route::get('/document_request/{id}', [ApiDocumentRequestController::class, 'show'])->name('document_request.show');
Route::put('/document_request/{id}', [ApiDocumentRequestController::class, 'update'])->name('document_request.update');
Route::delete('/document_request/{id}', [ApiDocumentRequestController::class, 'destroy'])->name('document_request.destroy');

//Doc types
Route::get('/documentType', [ApiDocumentTypeController::class, 'index'])->name('documentType.index');
Route::post('/documentType/store', [ApiDocumentTypeController::class, 'store'])->name('documentType.store');
Route::get('/documentType/{id}', [ApiDocumentTypeController::class, 'show'])->name('documentType.show');
Route::put('/documentType/{id}', [ApiDocumentTypeController::class, 'update'])->name('documentType.update');
Route::delete('/documentType/{id}', [ApiDocumentTypeController::class, 'destroy'])->name('documentType.destroy');
