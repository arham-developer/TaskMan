<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\{TaskController, UnitController};

Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('/units', [UnitController::class, 'index']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/subtasks/{taskId}', [TaskController::class, 'subTask']);

    Route::post('/task/create', [TaskController::class, 'create']);
    Route::post('/task/update/{taskId}', [TaskController::class, 'update']);
    Route::post('/task/delete/{taskId}', [TaskController::class, 'destroy']);

    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });

});

