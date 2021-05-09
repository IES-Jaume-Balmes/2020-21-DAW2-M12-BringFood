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

    Route::post('/dish/save','App\Http\Controllers\Api\DishController@store');
    Route::get('/dishes','App\Http\Controllers\Api\DishController@index');
    Route::get('/dish/{dish}','App\Http\Controllers\Api\DishController@show');
    Route::put('/dish/{dish}','App\Http\Controllers\Api\DishController@update');
    Route::delete('/dish/{dish}','App\Http\Controllers\Api\DishController@destroy');

    Route::post('/order/save','App\Http\Controllers\Api\OrderController@store');
    Route::get('/orders','App\Http\Controllers\Api\OrderController@index');
    Route::get('/order/{order}','App\Http\Controllers\Api\OrderController@show');
    Route::put('/order/{order}','App\Http\Controllers\Api\OrderController@update');
    Route::delete('/order/{order}','App\Http\Controllers\Api\OrderController@destroy');
    
    Route::post('/role/save','App\Http\Controllers\Api\RoleController@store');
    Route::get('/roles','App\Http\Controllers\Api\RoleController@index');
    Route::get('/role/{role}','App\Http\Controllers\Api\RoleController@show');
    Route::put('/role/{role}','App\Http\Controllers\Api\RoleController@update');
    Route::delete('/role/{role}','App\Http\Controllers\Api\RoleController@destroy');

    Route::post('/address/save','App\Http\Controllers\Api\AddressController@store');
    Route::get('/addresses','App\Http\Controllers\Api\AddressController@index');
    Route::get('/address/{address}','App\Http\Controllers\Api\AddressController@show');
    Route::put('/address/{address}','App\Http\Controllers\Api\AddressController@update');
    Route::delete('/address/{address}','App\Http\Controllers\Api\AddressController@destroy');

    Route::post('/user/save','App\Http\Controllers\Api\UserController@store');
    Route::put('/user/{user}','App\Http\Controllers\Api\UserController@update');
    Route::get('/user/{user}','App\Http\Controllers\Api\UserController@show');
    Route::delete('/user/{user}','App\Http\Controllers\Api\UserController@destroy');
    Route::get('/users','App\Http\Controllers\Api\UserController@index');
});
