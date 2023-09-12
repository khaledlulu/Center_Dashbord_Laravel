<?php

use App\Http\Controllers\API\APIAdminController;
use App\Http\Controllers\API\APICityCountroller;
use App\Http\Controllers\API\APIAuthUserController;
use App\Http\Controllers\API\APIDiplomaController;
use App\Http\Controllers\API\APIEmployeeController;
use App\Http\Controllers\API\APIGroupController;
use App\Http\Controllers\API\APIRoomController;
use App\Http\Controllers\API\APIStudantController;
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

Route::prefix('/ppc')->group(function () {
    Route::apiResource('cities', APICityCountroller::class);
    Route::apiResource('groups', APIGroupController::class);
    Route::apiResource('admins', APIAdminController::class);
    Route::apiResource('employees', APIEmployeeController::class);
    Route::apiResource('studants', APIStudantController::class);
    Route::apiResource('rooms', APIStudantController::class);
    Route::apiResource('diplomas', APIDiplomaController::class);
});

Route::prefix('/auth')->group(function () {
    Route::post('register', [APIAuthUserController::class, 'Register']);
    Route::post('login/admin', [APIAuthUserController::class, 'LoginAdmin']);
    Route::post('login/employee', [APIAuthUserController::class, 'loginEmployee']);
    Route::post('login/studant', [APIAuthUserController::class, 'loginStudant']);
});
Route::prefix('/auth')->middleware('auth:admin-api,employee-api,studant-api')->group(function () {
    Route::post('logout/admin', [APIAuthUserController::class, 'LogOutAdmin']);
    Route::post('logout/employee', [APIAuthUserController::class, 'LogOutEmployee']);
    Route::post('logout/studant', [APIAuthUserController::class, 'LogOutStudant']);
});
