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
Route::get('test', 'RoleController@getAllRoles');

Route::get('/', function()
{
    return View::make('index.index');
});

/* Regcode S */
// 注册码相关
Route::controller('regcode', 'RegcodeController');
// 注册码配置相关
Route::controller('regconf', 'RegcodeConfigController');
/* Regcode E */

/* User S */
Route::controller('user', 'UserController');
/* User E */

/* Role S */
Route::controller('role', 'RoleController');
/* Role E */

/* System S */
Route::controller('system', 'SystemController');
/* System E */
