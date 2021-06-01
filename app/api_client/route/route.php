<?php

use cigoadmin\middleware\ApiCheckIfUserLogin;
use think\facade\Route;

// 根路由
Route::get('/', '/Index/index');

/**
 * v1 版本路由
 */
Route::get("/test", "/test/token");

Route::group('client/:version/', function () {

    Route::group('/', function () {
        Route::post('logout', ":version.user/logout");
    })->append(['cigo_append_moduleName' => 'client'])->middleware([ApiCheckIfUserLogin::class]);

    Route::post("/phoneLogin", ":version.user/loginByPhone"); //登录
})->prefix('client/');

/**********************************************************************************************************************/
