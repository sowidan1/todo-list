<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix'=>'task'], function(){
        Route::post('/store', [TaskController::class,'store']);
        Route::post('/update/{id}', [TaskController::class,'update']);
        Route::get('/delete/{id}', [TaskController::class,'destroy']);
        Route::get('/all', [TaskController::class,'index']);
        Route::get('/show/{id}', [TaskController::class,'show']);
        Route::post('/status-update/{id}', [TaskController::class,'changeStatus']);
        Route::post('/restore/{id}', [TaskController::class,'restore']);
    });

    Route::group(['prefix'=>'category'], function(){
        Route::post('/store', [CategoryController::class,'store']);
        Route::get('/all', [CategoryController::class,'index']);
        Route::get('/delete/{id}', [CategoryController::class,'destroy']);
    });

    Route::post('/logout', [AuthController::class,'logout']);

});


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


