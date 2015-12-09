<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;

/**
 * 此类用来测试redis连接的
 * Class TestRedis
 * @package App\Http\Controllers
 */
class TestRedisController extends Controller{
    public function getIndex(){
        \WechatCallback::testFacade();
        echo 1;
        exit;
    }

    /**
     * 测试连接情况
     */
    public function getConnection(){
        /*According to the necessary of documention, visit the url http://laravel.com/docs/5.0/redis*/
        $redis = Redis::connection();
        exit;
    }
}