<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);
Route::post('/email/verify', [authController::class, 'verifyEmail'])->middleware('auth:sanctum');
Route::get('/email/verify/{id}/{hash}', [authController::class, 'Verifylink'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
Route::post('/logout', [authController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/password/forgot', [authController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/admin/users/{id}/confirm', [authController::class, 'confirm'])->middleware('auth:sanctum');



Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/download/{filename}', [ReportController::class, 'download'])->name('reports.download');
Route::get('/reports/view/{filename}', [ReportController::class, 'view'])->name('reports.view');
