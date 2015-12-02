<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller{
    /**
     * 个人主页
     */
    public function getIndex(){
        /*第一步加百度统计*/
        return View::make('index');
    }
}