<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index.index');
});

Route::get('/sw',function()
{
return 

});

Route::get('/regcode', 'RegcodeController@showList');

Route::get('/regcode/add', 'RegcodeController@add');