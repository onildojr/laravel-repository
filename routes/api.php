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
        Route::post('/', 'UsersController@create')->middleware('validate.user');
        Route::put('/{id}', 'UsersController@update')->middleware('validate.user');
        Route::delete('/{id}', 'UsersController@delete');
    });

    Route::group(['prefix' => 'albums'], function () {
        Route::get('/', 'AlbumsController@all');
        Route::get('/{id}', 'AlbumsController@find');
        Route::post('/', 'AlbumsController@create')->middleware('validate.album');
        Route::put('/{id}', 'AlbumsController@update')->middleware('validate.album');
        Route::delete('/{id}', 'AlbumsController@delete');
    });

    Route::group(['prefix' => 'artists'], function () {
        Route::get('/', 'ArtistsController@all');
        Route::get('/{id}', 'ArtistsController@find');
        Route::post('/', 'ArtistsController@create')->middleware('validate.artist');
        Route::put('/{id}', 'ArtistsController@update')->middleware('validate.artist');
        Route::delete('/{id}', 'ArtistsController@delete');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
