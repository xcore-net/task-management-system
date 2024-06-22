<?php

use App\Http\Controllers\Api\ApiFormController;
use App\Http\Controllers\Api\ApiUploadedFilesController;

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
