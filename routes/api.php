<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function () {
    Route::post('/user/save','App\Http\Controllers\UserController@saveUser');
});

Route::group(['middleware' => [], 'prefix' => 'v1'], function () {
    // Auth
    Route::post('/auth/login', 'App\Http\Controllers\TokensController@login');
    //Route::post('/auth/refresh', 'App\Http\Controllers\TokensController@refreshToken');
    //Route::get('/auth/logout', 'App\Http\Controllers\TokensController@logout');
    Route::post('/role/save','App\Http\Controllers\Api\RoleController@store');
});
