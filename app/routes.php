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
Route::post('regcode/doAddPlatform', 'RegcodeController@doAddPlatform');
/* Regcode E */

/* User S */
Route::controller('user', 'UserController');
// 添加用户
// Route::get('user/userList', 'UserController@userList');
// Route::get('user/add', function()
// {
//     return View::make('users.addUser');
// });
// 执行添加用户
// Route::post('user/doAddUser', 'UserController@doAddUser');
// Route::post('user/addUserError', function()
// {
//     View::make('users/addUserError');
// });
/* User E */

/* Role S */
// 添加角色(部门)页面
Route::get('role/add', 'RoleController@add');
// 执行添加角色(角色)
Route::post('role/doAddRole', 'RoleController@doAddRole');
/* Role E */

/* System S */
// 添加销售平台页面
Route::get('system/addPlatform', function()
{
    return View::make('systems.addPlatform');
});
// 执行添加平台信息
Route::post('system/doAddPlatform', 'SystemController@doAddPlatform');
/* System E */


/*
*  liuxiaowei
*/
//商品管理
Route::get('/goods', 'GoodsController@index');
Route::get('/goods/search', 'GoodsController@search');
Route::get('/goods/addGoods', 'GoodsController@addGoods');

//商品分类
Route::get('/goodstype', 'GoodstypeController@index');
Route::get('/goodstype/add', 'GoodstypeController@add');
Route::get('/goodstype/doAddType', 'GoodstypeController@doAddType');

//商品库存
Route::get('/goodstock', 'GoodstockController@index');
Route::get('/goodstock/addStock', 'GoodstockController@addStock');
Route::get('/goodstock/doAddStock', 'GoodstockController@doAddStock');

//销售的商品
Route::get('/goodsell', 'GoodsellController@index');
Route::get('/goodsell/addSell', 'GoodsellController@addSell');
Route::get('/goodsell/doAddSell', 'GoodsellController@doAddSell');


