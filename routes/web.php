<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [
        'uses' => 'StudentController@index',
        'as' => 'students',
    ]);

    Route::resource('students', 'StudentController');

    Route::resource('principals', 'PrincipalController');

    Route::get('students/{student}/tutors/create', [
        'uses' => 'TutorController@create',
        'as' => 'tutors.create',
    ]);

    Route::get('students/{student}/tutors/{tutor}/edit', [
        'uses' => 'TutorController@edit',
        'as'   => 'tutors.edit',
    ]);

    Route::post('tutors/create', [
        'uses' => 'TutorController@store',
        'as' => 'tutors.store',
    ]);

    Route::put('tutors/{tutor}', [
        'uses' => 'TutorController@update',
        'as' => 'tutors.update'
    ]);
});

Auth::routes();
