<?php

declare(strict_types=1);

namespace app\api_admin\controller;

use cigoadmin\middleware\CacheConfigs;
use think\facade\Config;

class Index
{
    public function index()
    {
        return '您好！这是一个[api-admin]示例';
    }
}
