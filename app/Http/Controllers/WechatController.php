<?php
namespace App\Http\Controllers;

use App\Services\BLogger;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Services\Image;

class WechatController extends Controller{
    public function __construct(){

    }

    public function getIndex(){
        Log::info(Request::all());
        $res = \WechatCallback::valid();
    }

    public function postIndex(){
        BLogger::getLogger(BLogger::LOG_WECHAT)->info('--------微信访问回调--------');
        BLogger::getLogger(BLogger::LOG_WECHAT)->info($GLOBALS["HTTP_RAW_POST_DATA"]);
        $res = \WechatCallback::response($GLOBALS["HTTP_RAW_POST_DATA"]);//相应微信消息,控制反转,IOC
        BLogger::getLogger(BLogger::LOG_WECHAT)->info('--------endvisit--------');
        return Response($res);
    }

    /**
     * 设置微信菜单
     */
    public function getSetMenu(){
        $response = \WechatCallback::setMenu();
        return Response($response);
    }

    /**
     * function: 从微信的服务端获取图片，返回一个本地服务器的图片url
     */
    public function anyPicMedia(){
        $mediaId = Input::get('media_id');
        $filename = Image::saveWeChatMedia($mediaId);
        //TODO:判断文件是否存在
        if(isset($filename['status'])){
            return Response::json($filename);
        }else {
            return Response::json(array('status' => true, 'data' => $filename));
        }
    }

}