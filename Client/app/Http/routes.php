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

Route::get('/', [
    'as' => 'index', 'uses' => 'WelcomeController@index'
]);

Route::get('/graphData1', [
    'as' => 'graphData1', 'uses' => 'HomeController@getGraphData1'
]);

Route::get('/graphData2', [
    'as' => 'graphData2', 'uses' => 'HomeController@getGraphData2'
]);

Route::get('/graphData3', [
    'as' => 'graphData3', 'uses' => 'HomeController@getGraphData3'
]);

Route::post('login', [
    'as' => 'login', 'uses' => 'WelcomeController@login'
]);