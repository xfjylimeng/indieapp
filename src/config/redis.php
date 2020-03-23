<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 缓存设置
// +----------------------------------------------------------------------

return [
    'host' =>env('redis.host',  '127.0.0.1'),
    'port' =>env('redis.port',  '6379'),
    'password' =>env('redis.password',  ''),
    'select' => env('redis.select',  7),
    'timeout' => 0,
    'expire' => env('redis.expire',  0),
    'persistent' => false,
    'prefix' => env('redis.prefix',  'yqn_'),
    'serialize' => true,
];
