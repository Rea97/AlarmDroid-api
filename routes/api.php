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
    return new \App\Http\Resources\User($request->user());
});

Route::post('/login', 'ApiLoginController@login');

Route::middleware('auth:api')->group(function () {
    // Robot routes
    Route::get('/robots/{robot}', 'RobotController@show')->name('robots.show');

    Route::get('/users/robots/status', 'RobotStatusController@index')->name('robots.status.index');
    Route::put('/users/robots/status', 'RobotStatusController@update')->name('robots.status.update');

    // Alerts routes
    Route::get('/alerts', 'AlertController@index')->name('alerts.index');
    Route::post('/alerts', 'AlertController@store')->name('alerts.store');
    Route::get('/alerts/{alert}', 'AlertController@show')->name('alerts.show')->where('alert', '[0-9]+');

    // Fixture alerts
    Route::get('/alerts/fixture', 'FixtureAlertController@store')->name('alerts.fixture.store');
});
