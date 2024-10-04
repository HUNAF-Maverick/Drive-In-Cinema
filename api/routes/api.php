<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ScreeningController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([], function () {
    Route::prefix( 'film')->controller(FilmController::class)->group(function () {
        Route::get('/all', 'getAll');
        Route::get('/{id}', 'get');
        Route::post('/new', 'new');
        Route::post('/{id}', 'set');
        Route::delete('/{id}', 'delete');
    });
    Route::prefix( 'screening')->controller(ScreeningController::class)->group(function () {
        Route::get('/all', 'getAll');
        Route::get('/{id}', 'get');
        Route::post('/new', 'new');
        Route::post('/{id}', 'set');
        Route::delete('/{id}', 'delete');
    });
})->middleware('auth:sanctum');
