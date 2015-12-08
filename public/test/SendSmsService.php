<?php
include_once "SendSms.php";
/**
 * Class SendSmsService
 */
class SendSmsService{
    /**
     * 服务提供者
     * @param $name
     * @param $arguments
     * @return mixed
     */
    static public function __callstatic($name,$arguments){
        $sendSms = SendSms::singleton();
        return call_user_func_array([$sendSms, $name], $arguments);
    }
}