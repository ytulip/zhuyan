<?php
/**
 * 发送短信的类
 * Class SendSms
 */
class SendSms{
    //保存例实例在此属性中
    private static $_instance;
    private $_c;
    private $_req;

    //构造函数声明为private,防止直接创建对象
    private function __construct()
    {
    }

    //单例方法
    public static function singleton()
    {
        if(!isset(self::$_instance))
        {
            $c=__CLASS__;
            self::$_instance=new SendSms;
            include_once "TopSdk.php";
            self::$_instance->init();

        }
        return self::$_instance;
    }

    /**
     * 初始化函数
     */
    public function init(){
        $this->_c = new TopClient;
        $this->_c->appkey = '23279369';
        $this->_c->secretKey = '6e785d9e0606d6d3fb4dfd0b0b4882a5';
        $this->_req = new AlibabaAliqinFcSmsNumSendRequest;
        $this->_req->setExtend("123456");
        $this->_req->setSmsType("normal");
    }

    /**
     * @param $mobile
     * @param $code
     */
    public function sendRegisterSms($mobile,$code){
        $this->_req->setSmsFreeSignName("注册验证");
        $this->_req->setSmsParam('{"code":"'.$code.'","product":"alidayu"}');
        $this->_req->setRecNum($mobile);
        $this->_req->setSmsTemplateCode("SMS_2725160");
        return $this->_c->execute($this->_req);
    }

    //阻止用户复制对象实例
    public function __clone()
    {
        trigger_error('Clone is not allow' ,E_USER_ERROR);
    }
}