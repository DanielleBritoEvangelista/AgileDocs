<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* #region Category */

Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class, 'store']);
Route::get('/categories/{id}',[CategoryController::class, 'show']);
Route::get('/categories/{id}/edit',[CategoryController::class, 'edit']);
Route::put('/categories/{id}/edit',[CategoryController::class, 'update']);
// Route::delete('/categories/{id}/delete',[CategoryController::class, 'destroy']);

/* #endregion */