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

Route::get('/subjects', '\App\Http\Controllers\SubjectController@index');
Route::get('/goals', '\App\Http\Controllers\GoalController@index');


Route::post('/register', '\App\Http\Controllers\AuthController@register');
Route::post('/login','\App\Http\Controllers\AuthController@login');

Route::group(['middleware'=> ['auth:sanctum']],function(){
    Route::post('/logout', '\App\Http\Controllers\AuthController@logout');
});
