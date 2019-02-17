<?php

use Illuminate\Http\Request;

// require 'controllers/AccountController';

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

Route::middleware('api')->get('/accounts', 'AccountController@get');
Route::middleware('api')->post('/accounts', 'AccountController@post');
Route::middleware('api')->put('/accounts/{id}', 'AccountController@update');
