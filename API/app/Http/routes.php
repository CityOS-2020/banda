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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('arduinoSenzor/{data}', 'HomeController@getGraphData1');
/*
 * graph data
 */
Route::get('/graphData1', [
    'as' => 'graphData1', 'uses' => 'HomeController@sendGraphData1'
]);

Route::post('/App', [
    'as' => 'graphDataApp', 'uses' => 'HomeController@sendGraphDataApp'
]);


/*
 * login
 */

Route::post('login', 'AuthController@login');
/*
 * no time for this implementation
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
