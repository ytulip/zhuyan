<?php
namespace App\Services;
use Ytulip\Ycurl\WechatResponse;

/**
 * Class MyWechatResponse
 * @package App\Services
 */
class MyWechatResponse implements WechatResponse{
    private $_data_raw = '';
    private $_post_obj;
    private $_response_str;
    const MSG_TYPE_TEXT = 'text';

    public function init($data){
        $this->_data_raw = $data;
        $this->_post_obj = simplexml_load_string($this->_data_raw, 'SimpleXMLElement', LIBXML_NOCDATA);
        /**
         * 我觉得这些消息都是用msgType去分的
         */
        switch($this->_post_obj->MsgType){
            case self::MSG_TYPE_TEXT:
                $this->_response_str = self::textMsg();
                break;
        }

    }

    public function response(){
        return $this->_response_str;
    }

    /**
     * 回复文本消息
     */
    public function textMsg(){
        $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
        $result = sprintf($textTpl, $this->_post_obj->FromUserName, $this->_post_obj->ToUserName, time(), 'text', $this->_post_obj->Content);
        return $result;
    }
}