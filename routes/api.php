<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store')->middleware('auth:api');
Route::put('/categories/{category}', 'CategoryController@update')->middleware('auth:api');

Route::get('/presentations', 'PresentationController@index');
Route::get('/presentations/{presentation}', 'PresentationController@show');
Route::post('/presentations', 'PresentationController@store')->middleware('auth:api');
Route::put('/presentations/{presentation}', 'PresentationController@update')->middleware('auth:api');
Route::delete('/presentations/{presentation}', 'PresentationController@destroy')->middleware('auth:api');