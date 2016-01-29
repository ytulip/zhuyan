<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>ueditor</title>
</head>
<link href="/css/common.css" rel="stylesheet"/>
<style>
    body{
        background-color: #f6f6f6;
    }
    .outer{width: 100%;height: 146px;background: #333;}
    .container-warp{width: 100%;}
    .container{margin: 0 auto;width:960px; height: auto;padding-top: 47px;}
    .ui-btn {
        background: #1cb0f4;
        height: 37px;
        width: 96px;
        cursor: pointer;
        display: inline-block;
        margin-left: 5px;
        outline: none;
        font-size: 16px;
        line-height: 35px;
        color: #fff;
        text-shadow: 1px 1px rgba(18,152,196,.75);
        text-align: center;
        font-family: Tahoma,Helvetica,"Microsoft Yahei",arial;
        float: left;
    }

    .title-input {
        height: 24px;
        width: auto;
        line-height: 24px;
        padding: 5px;
        min-width: 890px;
        overflow: hidden;
        font-size: 16px;
        font-family: Tahoma,Helvetica,"Microsoft Yahei",arial;
    }

    .title-text{
        font-size: 18px;
        font-family: Tahoma,Helvetica,"Microsoft Yahei",arial;
    }
</style>
<body>
<div class="container">
    <div class="" id="article-title" style="padding-bottom: 27px"><span class="title-text">标题：</span><input type="text" placeholder="请输入文章标题" class="title-input"/></div>
    <script id="editor" type="text/plain" style="width:960px;height:460px;"></script>
    <a class="ui-btn mt12" id="publish-article">发布</a>
</div>
{{--<div class="left-float-bar" style="position: fixed;right: 15px;bottom: 40px;min-height: 70px;min-width: 40px;background-color: #4cffff">--}}
    {{--<a><img src="/image/iconfont-list.png"/></a>--}}
    {{--<a><img src="/image/iconfont-feedback.png"/></a>--}}
{{--</div>--}}
</body>
<script src="/js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="/editor/ueditor/ueditor.config.js"></script>
<script src="/editor/ueditor/ueditor.all.min.js"> </script>
<script src="/editor/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="/js/plugintool-1.0.js"></script>
<script src="/js/plugin/leftfloatbar/left-float-bar.js"></script>
<script>
    var ue = UE.getEditor('editor');
    new LeftLoatBar({});
</script>
</html>