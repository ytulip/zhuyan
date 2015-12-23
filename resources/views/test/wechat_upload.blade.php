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

@section('script')
    @parent
    <script src="/js/jweixin-1.0.0.js"></script>
    <script>
        /*微信的配置*/
        wx.config({
            debug: false,
            appId: '{{{$signPackage["appId"]}}}',
            timestamp: '{{{$signPackage["timestamp"]}}}',
            nonceStr: '{{{$signPackage["nonceStr"]}}}',
            signature: '{{{$signPackage["signature"]}}}',
            jsApiList: [
                'checkJsApi',
                'chooseImage',
                'previewImage',
                'uploadImage']
        });
    </script>
    <script src="/js/plugin/wechat_upload_img.js"></script>
    @stop