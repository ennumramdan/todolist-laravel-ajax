<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('list','ListController@index');
Route::post('list', 'ListController@create');
Route::post('update', 'ListController@update');
Route::post('delete', 'ListController@delete');

Route::get('search','ListController@search');