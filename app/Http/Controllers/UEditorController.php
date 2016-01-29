<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

/**
 * 百度富文本编辑器的自定义
 *
 * Class UEditorController
 * @package App\Http\Controllers
 */
class UEditorController extends Controller{
    /**
     * 显示编辑器
     */
    public function getIndex(){
        return View::make('ueditor');
    }

    /**
     * 显示文章列表
     */
    public function getList(){

    }
}