<?php
// 这是系统自动生成的middleware定义文件

use cigoadmin\middleware\ApiCrossDomain;
use cigoadmin\middleware\CacheConfigs;

return [
    //系统缓存配置
    CacheConfigs::class,
    //跨域请求
    ApiCrossDomain::class,
];
