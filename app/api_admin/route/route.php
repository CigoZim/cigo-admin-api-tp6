<?php

use cigoadmin\middleware\DemoShow;
use cigoadmin\middleware\ApiCheckUserAuth;
use cigoadmin\middleware\ApiCheckIfUserLogin;
use think\facade\Route;

// 根路由
Route::get('/', '/Index/index');

Route::group('admin/:version/', function () {
    /**********************************************************************************************************************/
    Route::group('/', function () {
        /*************************************数据改动类路由，进行分组便于做统一限制*************************************************/
        Route::group('add/', function () {
            Route::post("User", ":version.user/addUser"); //添加用户
            Route::post("Manager", ":version.manager/addManager"); //添加管理员
            Route::post("Rule", ":version.auth/addRule"); //添加权限节点
            Route::post("Group", ":version.auth/addGroup"); //添加权限分组
        })->prefix('add/')->middleware(DemoShow::class);
        Route::group('edit/', function () {
            Route::post("User", ":version.user/editUser"); //修改用户
            Route::post("Manager", ":version.manager/editManager"); //修改管理员
            Route::post("Rule", ":version.auth/editRule"); //修改权限节点
            Route::post("Group", ":version.auth/editGroup"); //修改权限分组
        })->prefix('edit/')->middleware(DemoShow::class);
        Route::group('status/', function () {
            Route::post("User", ":version.user/statusUser"); //设置用户状态
            Route::post("Manager", ":version.manager/statusManager"); //设置管理员状态
            Route::post("Rule", ":version.auth/statusRule"); //设置权限节点状态
            Route::post("Group", ":version.auth/statusGroup"); //设置权限分组状态
        })->prefix('status/')->middleware(DemoShow::class);
        /********************************* 获取数据列表 *************************************************************************/
        Route::post("/userList", ":version.user/getUserList"); //获取用户列表
        Route::post("/managerList", ":version.manager/getManagerList"); //获取管理员列表
        Route::post("/ruleList", ":version.auth/getRuleList"); //获取权限节点列表
        Route::post("/groupList", ":version.auth/getGroupList"); //获取权限分组列表
        Route::post("/menu/tree", ":version.menu/index"); //获取树形菜单列表
        Route::get("/menu/base", ":version.menu/base"); //获取基础菜单列表
        Route::get("/menu/both", ":version.menu/both"); //获取树形和基础菜单列表

    })->append(['cigo_append_moduleName' => 'admin'])->middleware([ApiCheckUserAuth::class]);

    /**********************************************************************************************************************/
    Route::group('/', function () {
        Route::post('logout', ":version.manager/logout");
    })->append(['cigo_append_moduleName' => 'admin'])->middleware([ApiCheckIfUserLogin::class]);

    Route::post('login', ":version.manager/login");

    Route::post("/local/upload", ":version.upload/upload"); //本地文件上传
    Route::post("/cloud/token", ":version.upload/token"); //获取七牛云凭证
    Route::post("/notify/qiniu", ":version.notify/qiniu"); //七牛云异步通知
    Route::post("/notify/tencent", ":version.notify/tencent"); //腾讯云异步通知
    Route::post("/sendSmsCode", ":version.tools/sendSmsCode"); //发送短信验证码

})->prefix('admin/');
