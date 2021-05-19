<?php

use think\facade\Route;

// 根路由
Route::get('/', '/Index/index');

/**
 * v1 版本路由
 */
Route::get("/test", "/test/token");

Route::group('client/:version/', function () {
    Route::post("/phoneLogin", ":version.user/loginByPhone"); //登录
})->prefix('client/');

/**********************************************************************************************************************/
