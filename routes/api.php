<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiFormController;
use App\Http\Controllers\Api\ApiFieldController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/form', [ApiFormController::class, 'index']);
Route::post('/form', [ApiFormController::class, 'store']);
Route::put('/form/{id}', [ApiFormController::class, 'update']);
Route::get('/form/{id}', [ApiFormController::class, 'show']);
Route::delete('/form/{id}', [ApiFormController::class, 'destroy']);

Route::get('/field', [ApiFieldController::class, 'index']);
Route::post('/field', [ApiFieldController::class, 'store']);
Route::put('/field/{id}', [ApiFieldController::class, 'update']);
Route::get('/field/{id}', [ApiFieldController::class, 'show']);
Route::delete('/field/{id}', [ApiFieldController::class, 'destroy']);
