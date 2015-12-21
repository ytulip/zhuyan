@extends('master.base_mobile')
@section('title')
    微信图片上传
    @stop
@section('style')
    <style>

    </style>
    @stop
@section('body')
    <div class="pure-black-panel">
        <div class="img-panel">
            <img src="/image/example.jpg"/>
        </div>
        <div style="text-align: center">
           <div class="separate-line"></div>
        </div>
        <div class="opr-btn" style="margin-top: 40px">
            <img src="/image/import_icon.png" style="width:60px;height: 60px;"/>
        </div>
    </div>
    @stop