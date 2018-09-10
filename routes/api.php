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

//route to convert decimal to roman numerals
Route::get('/Convert/{int}', 'RomanNumeralsController@convert');

// get last 15 entries
Route::get('/Latest', 'RomanNumeralsController@getLatest');

// get the top converted decimals by usage count
Route::get('/Top10', 'RomanNumeralsController@getTop10');
