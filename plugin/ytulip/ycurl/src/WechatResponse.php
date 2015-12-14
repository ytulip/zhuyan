<?php
namespace Ytulip\Ycurl;
/**
 * 实现控制反转的类
 * Interface WechatResponse
 * @package Ytulip\Ycurl
 */
interface WechatResponse{
    /**
     * @param $postRaw 返回的数据
     * @return mixed
     */
    public function init($postRaw);


    /**
     * 响应微信的内容
     * @return mixed
     */
    public function response();
}