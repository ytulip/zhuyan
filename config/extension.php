<?php
return [
    'wechat'=>[
        'appid'=>'wx7a4ff50bc88fd698',
        'appsercret'=>'91a0c62e6d4a5f58a323dc31e7b06d50',
        'token'=>'wechat',
        'token_path'=>storage_path() . '/wechat/access_token.json',
        'ticket_path'=>storage_path() . '/wechat/jsapi_ticket.json',
        'menu_path'=>storage_path() . '/wechat/menu.json' //自定义菜单存储路径
    ]
];