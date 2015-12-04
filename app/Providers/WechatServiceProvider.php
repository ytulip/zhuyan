<?php
namespace App\Providers;

use App\Services\MyWechatResponse;
use Illuminate\Support\ServiceProvider;

/**
 * Class WechatServiceProvider
 * @package App\Providers
 */
class WechatServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('WechatCallback',function(){
            return new \Ytulip\Ycurl\WechatCallback(config('extension.wechat'),new MyWechatResponse());
        });
    }

    public function boot()
    {
    }
}