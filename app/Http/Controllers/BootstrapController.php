<?php
namespace App\Http\Controllers;
class BootstrapController extends Controller{
    public function getIndex(){
        return View('bootstrap.index');
    }

    public function getTestUpload(){
        return View('bootstrap.load');
    }
}