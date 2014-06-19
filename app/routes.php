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
Route::get('regcode', 'RegcodeController@showList');
Route::get('regcode/addRegcode', 'RegcodeController@addRegcode');
Route::get('regcode/addConfig', function()
{
    return View::make('regcodes.addConfig');
});
Route::post('regcode/doAddType', 'RegcodeController@doAddType');
Route::post('/regcode/doAddPlatform', 'RegcodeController@doAddPlatform');
/* Regcode E */

/* User S */
// 添加用户
Route::get('/user/add', function()
{
    return View::make('users.addUser');
});
/* User E */

/* Role S */
// 添加角色(部门)
Route::get('/role/add', function()
{
    return View::make('roles.addRole');
});
/* Role E */


/*
*  liuxiaowei
*/

Route::get('/entity/index', 'EntityController@index');

/*
Route::get('/entity/index', function()
{
    return View::make('entity.index');
});
*/
