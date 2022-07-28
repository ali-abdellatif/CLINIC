<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/user-profile', [AuthController::class, 'userProfile']);
Route::post('/editProfile', [AuthController::class, 'editProfile']);

Route::get('/doctors', [MainController::class, 'allDoctors']);
Route::post('/doctorSchedule', [MainController::class, 'doctorSchedule']);
Route::get('/homePage', [MainController::class, 'homePage']);
Route::post('/clinic', [MainController::class, 'clinic']);
Route::post('/subService', [MainController::class, 'subService']);


