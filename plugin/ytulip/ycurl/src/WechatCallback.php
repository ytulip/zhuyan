<?php
namespace Ytulip\Ycurl;
class WechatCallback{
    //默认的token为wechat
    private $_appid = null;
    private $_appsercret = null;
    private $_token = 'wechat';
    private $_reponse_obj = null;
    private $_token_path = null;
    private $_ticket_path = null;
    private $_menu_path = null;

    /**
     * 配置数组
     * @param array $config
     * @param WechatResponse $response 控制反转的对象
     */
    public function __construct(Array $config,WechatResponse $response){
        $this->_token = $config['token'];
        $this->_reponse_obj = $response;
        $this->_menu_path = $config['menu_path'];
        $this->_token_path = $config['token_path'];
        $this->_ticket_path = $config['ticket_path'];
        $this->_appid = $config['appid'];
        $this->_appsercret = $config['appsercret'];
    }


    /**
     * 返回验证串
     * @return mixed
     */
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            ob_clean();
            echo $echoStr;
            exit;
        }
    }


    public function response($data){
        $this->_reponse_obj->init($data);
        return $this->_reponse_obj->response();
    }

    /**
     * 设置菜单
     */
    public function setMenu(){
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $this->getAccessToken();
        $data = file_get_contents($this->_menu_path);
        return YCurl::curlPost($url,$data);
    }

    /**
     * 获得微信token
     */
    public function getAccessToken(){
        self::check();
        $jssdk = new JSSDK($this->_appid,$this->_appsercret,$this->_token_path,$this->_ticket_path);
        return $jssdk->getAccessToken();
    }

    /**
     * 检测文件是否存在,如果不存在则创建
     */
    private function check(){
        $accessTokenFile = $this->_token_path;
        $jsapiTicketFile = $this->_ticket_path;
        $accessTokenData =json_encode(array(
            'access_token'=>'',
            'expire_time'=>0,
        ));
        $jsapiTicketData = json_encode((object)(array(
            'jsapi_ticket'=>'',
            'expire_time'=>0,
        )));
        if(!file_exists($accessTokenFile)){
            //创建文件
            $fp = fopen($accessTokenFile, "w");
            fwrite($fp, $accessTokenData);
            fclose($fp);
            chmod($accessTokenFile,0660);
        }
        if(!file_exists($jsapiTicketFile)){
            $fp = fopen($jsapiTicketFile,"w");
            fwrite($fp, $jsapiTicketData);
            fclose($fp);
            chmod($jsapiTicketFile,0660);
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = $this->_token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }


    /**
     * 这个js需要的东西
     */
    public function getSignPackage(){
        self::check();
        $jssdk = new JSSDK($this->_appid,$this->_appsercret,$this->_token_path,$this->_ticket_path);
        return $jssdk->getSignPackage();
    }
}