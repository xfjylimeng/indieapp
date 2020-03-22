<?php


namespace lemon\facade;


use think\Facade;

/**
 * @see \library\Appauth
 * @mixin library\Appauth
 * @method mixed auth_list($authorization='',$api_info=[]) static 获取应用权限列表
 * @method mixed login($params=[],$api_info=[]) static 账号密码登录
 */
class Appauth extends Facade
{

    protected static function getFacadeClass()
    {
        return 'lemon\library\Appauth';
    }

}