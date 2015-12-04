<?php
namespace App\Services;
use Monolog\Logger;
use Illuminate\Log\Writer;

/**
 * 自定义日志类
 * Class BLogger
 * @package App\Services
 */
class BLogger
{
    // 所有的LOG都要求在这里注册
    const LOG_ERROR = 'error';
    const LOG_INFO = 'info';
    const LOG_SHOPPING = 'shopping';
    const LOG_WECHAT = 'wechat';
    const LOG_ASAPI = 'saapi';
    const LOG_MALIPAY = "m_alipyorder";
    const LOG_SCHEDULES = "schedules";
    const LOG_SYNC = "sync";

    private static $loggers = array();

    // 获取一个实例
    public static function getLogger($type = self::LOG_ERROR, $day = 30)
    {
        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type."-".php_sapi_name().'.log', $day);
        }

        $log = self::$loggers[$type];
        return $log;
    }
    
    public static function getYunlog($path,$filename,$info){ 
    	 $time1 = date("Y-m-d",time());
    	 $time2 = date("Y-m-d H:s:i",time());
    	 $res = error_log($time2." :".$info."\r\n",3, $path.$time1."_".$filename);
    	 if($res){
    	 	return true;
    	 }
    	 return false;
    	
    }
    
    public static function getAdminlog($data){
    	$time = date("Y-m-d H:i:s",time());
    	
    	include_once app_path().'/models/admin/Adminlog.php';
    	$real_ip  = Adminlog::real_ip();

        if(isset($data['aid'])){
            $user_id = $data['aid'];
        }else{
            $user_id  = Session::get('aid');

        }

    	if(isset($data['level'])){
            $level = $data['level'];
        }else{
            $level  = Session::get('level');

        }
        
    	if(isset($data['username'])){
            $username = $data['username'];
        }else{
            $username = Session::get('username');
        }

        

        if(isset($data['source'])){
            $source = $data['source'];
        }else{
            $source   = 1;
        }
        
//        $access_url = $_SERVER['REQUEST_URI'];
        if(isset($_SERVER['REQUEST_URI'])){
            $access_url = $_SERVER['REQUEST_URI'];
        }else{
            $access_url = 'sync';
        }
    	
    	$res = $data;
    	
    	$id = DB::table("admin_log")->insertGetId(array('source' => $source, 'user_id' => $user_id,'username' => $username
     												   ,'create_at'=>$time,'loginip'=>$real_ip,'access_url'=>$access_url,'level'=>$level
     												   ,'menuname'=>$res['menuname'],'data'=>$res['data']
     												   ,'querystring'=>$res['querystring'],'status'=>$res['status']));
        if($id)
        {
        	return $id;
        }
        
     	return false;
    }
    
	public static function getrand($n){
		$chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'g', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		
		$res = '';
		
		for($i = 0; $i<$n; $i++){
			$id = rand(0,35);
			$res .= $chars[$id];
		}

		return $res;
	}

}