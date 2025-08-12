<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\Auth\LoginRegisterController;

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

// Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Public routes of medicalrecord
Route::controller(MedicalRecordController::class)->group(function() {
    Route::get('/medicalrecord', 'index');
    Route::get('/medicalrecord/{id}', 'show');
    Route::get('/medicalrecord/search/{name}', 'search');
});

// Protected routes of medicalrecord and logout
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::controller(MedicalRecordController::class)->group(function() {
        Route::post('/medicalrecord', 'store');
        Route::post('/medicalrecord/{id}', 'update');
        Route::delete('/medicalrecord/{id}', 'destroy');
    });
});