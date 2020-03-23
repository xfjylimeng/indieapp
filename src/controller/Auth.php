<?php

/**
 * 控制台读取独立应用基本配置信息
 * Class Auth
 * @package app\controller
 */
class Auth
{

    /**
     * 应用的基本信息
     */
    public function info()
    {

        $baseUrl = $this->request->domain().'/';
        $info = [
            'app_name' => '供货商后台',
            'app_baseurl' => $baseUrl,
            'app_callback' => [
                // 首页地址
                'index' => 'admin/login',
                // 菜单节点
                'menu' => 'api/auth/menu'
            ],
        ];
        api_result($info);
    }


    /**
     * 独立应用菜单配置信息
     */
    public function menu()
    {
        $info =config('menu.auth_list');
        api_result($info);
    }
}
