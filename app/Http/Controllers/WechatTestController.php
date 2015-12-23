<?php
namespace App\Http\Controllers;
/**
 * 此类用来测试微信公众号的
 * Class WechatTestController
 * @package App\Http\Controllers
 */
class WechatTestController extends Controller{
    /**
     * 回调url
     */
    public function getIndex(){

    }

    /**
     * 响应事件推送
     */
    public function postIndex(){

    }

    /**
     * 上传图片
     */
    public function getUploadImg(){
        \WechatCallback::getSignPackage();
        return View('test.wechat_upload');
    }

    /**
     * 获得分辨率
     */
    public function getResolution(){
        return View('device');
    }

    /**
     * 上传图片
     */
    public function postUploadImg(){

    }
}