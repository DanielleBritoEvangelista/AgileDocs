<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* #region Document */

Route::get('/documents',[DocumentController::class, 'index']);
Route::post('/documents',[DocumentController::class, 'store']);
Route::get('/documents/{id}',[DocumentController::class, 'show']);
Route::get('/documents/{id}/edit',[DocumentController::class, 'edit']);
Route::put('/documents/{id}/edit',[DocumentController::class, 'update']);
// Route::delete('/documents/{id}/delete',[DocumentController::class, 'destroy']);

/* #endregion */

/* #region Category */

Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class, 'store']);
Route::get('/categories/{id}',[CategoryController::class, 'show']);
Route::get('/categories/{id}/edit',[CategoryController::class, 'edit']);
Route::put('/categories/{id}/edit',[CategoryController::class, 'update']);
// Route::delete('/categories/{id}/delete',[CategoryController::class, 'destroy']);

/* #endregion */

/* #region Team */

Route::get('/teams',[TeamController::class, 'index']);
Route::post('/teams',[TeamController::class, 'store']);
Route::get('/teams/{id}',[TeamController::class, 'show']);
Route::get('/teams/{id}/edit',[TeamController::class, 'edit']);
Route::put('/teams/{id}/edit',[TeamController::class, 'update']);
// Route::delete('/teams/{id}/delete',[TeamController::class, 'destroy']);

/* #endregion */

/* #region User */

Route::get('/users',[UserController::class, 'index']);
Route::post('/users',[UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'show']);
Route::get('/users/{id}/edit',[UserController::class, 'edit']);
Route::put('/users/{id}/edit',[UserController::class, 'update']);
// Route::delete('/teams/{id}/delete',[UserController::class, 'destroy']);

/* #endregion */