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
Route::controller('regcode', 'RegcodeController');
// Route::get('regcode', 'RegcodeController@showList');
// Route::get('regcode/addRegcode', 'RegcodeController@addRegcode');
// Route::get('regcode/addConfig', function()
// {
//     return View::make('regcodes.addConfig');
// });
// Route::post('regcode/doAddType', 'RegcodeController@doAddType');
// Route::post('regcode/doAddPlatform', 'RegcodeController@doAddPlatform');
/* Regcode E */

/* User S */
Route::controller('user', 'UserController');
/* User E */

/* Role S */
// 添加角色(部门)页面
Route::controller('role', 'RoleController');
// Route::get('role/add', 'RoleController@add');
// // 执行添加角色(角色)
// Route::post('role/doAddRole', 'RoleController@doAddRole');
/* Role E */

/* System S */
Route::controller('system', 'SystemController');
// // 添加销售平台页面
// Route::get('system/addPlatform', function()
// {
//     return View::make('systems.addPlatform');
// });
// // 执行添加平台信息
// Route::post('system/doAddPlatform', 'SystemController@doAddPlatform');
/* System E */


/*
*  liuxiaowei
*/

Route::get('/goods/index', 'GoodsController@index');
Route::get('/goods/search', 'GoodsController@search');
Route::get('/goods/addGoods', 'GoodsController@addGoods');

/*
Route::get('/goods/index', function()
{
    return View::make('goods.index');
});
*/
