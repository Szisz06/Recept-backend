<?php

use App\Http\Controllers\ReceptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/receptek', [ReceptController::class, 'index']);
Route::get('/receptek/{id}', [ReceptController::class, 'show']);
Route::post('/receptek', [ReceptController::class, 'store']);
Route::delete('/recept/{id}', [ReceptController::class, 'destroy']);