<?php

return [
    'listen' => [
        // 后台用户登录成功事件监听
        'AdminLogin' => [
            'app\api_admin_qiuyu\listener\AdminLogin',
            'app\api_admin\listener\CommonLogin',
        ],
        // 客户端用户登录成功事件监听
        'ClientLogin' => [
            'app\api_admin\listener\CommonLogin',
        ],
    ],
];
