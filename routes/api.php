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

Route::post('/login', 'ApiLoginController@login');

// Robot routes
Route::get('/robots/{robot}', 'RobotController@show')->name('robots.show');

// Alerts routes
Route::get('/alerts', 'AlertController@index')->name('alerts.index');
