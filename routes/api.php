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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// set new routes for api
Route::get('/Convert', 'RomanNumeralsController@index');

Route::get('/Recent' , function () {
    return "Recent";
});

Route::get('/Top10' , function () {
    return "Top 10 ";
});
