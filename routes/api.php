<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// training
Route::post('/training/store', [TrainingController::class, 'store']);
Route::get('/training/getTraining', [TrainingController::class, 'getTraining']);
Route::get('/training/getTrainingById/{id}', [TrainingController::class, 'getTrainingById']);
Route::post('/training/update/{id}', [TrainingController::class, 'update']);
Route::delete('/training/deleteById/{id}', [TrainingController::class, 'destroy']);

// rent book
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/getall', [KaryawanController::class, 'getall']);