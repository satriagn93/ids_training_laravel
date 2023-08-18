<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExternalController;

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
Route::middleware('auth:sanctum')->post('/training/store', [TrainingController::class, 'store']);
Route::middleware('auth:sanctum')->get('/training/getTraining', [TrainingController::class, 'getTraining']);
Route::middleware('auth:sanctum')->get('/training/getTrainingById/{id}', [TrainingController::class, 'getTrainingById']);
Route::middleware('auth:sanctum')->post('/training/update/{id}', [TrainingController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/training/deleteById/{id}', [TrainingController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/training/getTrainingPagination', [TrainingController::class, 'getTrainingPagination']);


Route::get('/training/province', [ExternalController::class, 'provinceExternal']);

// rent book
Route::middleware('auth:sanctum')->post('/karyawan/store', [KaryawanController::class, 'store']);
Route::middleware('auth:sanctum')->get('/karyawan/getall', [KaryawanController::class, 'getall']);

Route::post('/login', [LoginController::class, 'login']);