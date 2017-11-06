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

Route::group(
    ['prefix' => 'v1'],
    function () {
        Route::get('/students', [
            'uses' => 'StudentController@students',
        ]);

        Route::get('/autocomplete', [
            'uses' => 'StudentController@autocomplete',
        ]);

        Route::get('/city', [
            'uses' => 'StudentController@city',
        ]);

        Route::get('/principals', [
            'uses' => 'PrincipalController@principals',
        ]);
    }
);