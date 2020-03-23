<?php
/***
 * 独立应用操作菜单配置
 */
return [
    'auth_list' => [
        [
            'title' => '供货商管理',
            'linkurl' => '',
            'children' => [
                [
                    'title' => '审核列表',
                    'linkurl' => 'supplier/index',
                ]
            ]
        ],
        [
            'title' => '巨划算管理',
            'linkurl' => '',
            'children' => [
                [
                    'title' => '审核列表',
                    'linkurl' => 'supplier/prom_putway',
                ],
            ]
        ],
    ]
];