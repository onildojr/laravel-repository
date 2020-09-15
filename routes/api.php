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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@all');
        Route::get('/{id}', 'UsersController@find');
        Route::post('/', 'UsersController@create');
        Route::put('/{id}', 'UsersController@update');
        Route::delete('/{id}', 'UsersController@delete');
    });

    Route::group(['prefix' => 'albums'], function () {
        Route::get('/', 'AlbumsController@all');
        Route::get('/{id}', 'AlbumsController@find');
        Route::post('/', 'AlbumsController@create');
        Route::put('/{id}', 'AlbumsController@update');
        Route::delete('/{id}', 'AlbumsController@delete');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
