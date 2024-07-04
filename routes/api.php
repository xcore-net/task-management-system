<?php

use App\Http\Controllers\Api\ApiFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/form', [ApiFormController::class, 'index']);
Route::get('/form/{id}', [ApiFormController::class, 'show']);
Route::post('/form', [ApiFormController::class, 'store']);
Route::put('/form/{id}', [ApiFormController::class, 'update']);
Route::delete('/form/{id}', [ApiFormController::class, 'destroy']);
