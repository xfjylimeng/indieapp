<?php

namespace yiqiniu\library;

use yiqiniu\facade\Redis;
use think\Exception;

class Appauth
{
    //获取 总后台 所有权限列表
    public  function auth_list($authorization='',$api_info=[])
    {
        try {
            if (empty($authorization)) {
                api_exception(400, '缺少验证信息');
            }
            if(!empty($api_info)){
                $url = $api_info['get_menu'];        //请求地址
                $appid = $api_info['appid'];    //appid
            }else{
                $z_auth = config('api.z_auth');  //读取 配置信息
                $url = $z_auth['get_menu'];        //请求地址
                $appid = $z_auth['appid'];    //appid
            }
            $header[] = 'authorization:' . $authorization;
            $header[] = 'appid:' . $appid;  //appid
            $result = httpRequest($url, $params = [], 'POST', false, $header);
            $result = json_decode($result, true);
            if ($result['code'] == 200) {
                //获取已经授权的menu
                $data = $result['data'];
                $authlist = [];
                $admin_info = $data['admin'];
                $authmenu = $data['authmenu'];
                foreach ($authmenu as $value) {
                    $authlist[$value] = true;
                }
                Redis::set('auth_' . $authorization, ['authlist' => $authlist, 'admin_info' => $admin_info], 2100); //35分钟有效期
                api_result(200, '', ['operaction' => $authlist]);
            } else {
                api_result($result['code'], $result['msg']);
            }

        } catch (Exception $e) {
            api_result($e);
        }
    }

    public  function login($params=[],$api_info=[])
    {
        try {
            if (empty($params['username']) || empty($params['password'])) {
                api_result(401, '用户登录信息不为空');
            }
            if(!empty($api_info)){
                $url = $api_info['login'];        //请求地址
                $appid = $api_info['appid'];    //appid
            }else{
                $z_auth = config('api.z_auth');  //读取 配置信息
                $url = $z_auth['login'];        //请求地址
                $appid = $z_auth['appid'];    //appid
            }
            $params['appid']=$appid;
            $result = httpRequest($url, $params, 'POST');
            $result = json_decode($result, true);
            if ($result['code'] == 200) {
                //获取授权信息
                $data = $result['data'];
                $token = $data['token'];
                $admin_info = $data['admin'];
                $authmenu = $data['authmenu'];
                $authlist = [];
                foreach ($authmenu as $value) {
                    $authlist[$value] = true;
                }
                Redis::set('auth_' . $token, ['authlist' => $authlist, 'admin_info' => $admin_info], 2100); //35分钟有效期
                api_result(['operaction' => $authlist, 'token' => $token]);
            } else {
                api_result($result['code'], $result['msg']);
            }
        } catch (Exception $e) {
            api_result($e);
        }
    }


}