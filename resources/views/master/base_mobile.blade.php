<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blank">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-page-mode" content="app">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <link href="/css/panel_style.css" rel="stylesheet"/>
    @section('css_link')
        @show
    <title>@yield('title','默认标题')</title>
</head>
<style>
    /*reset*/
    html,body,h1,h2,h3,h4,h5,h6,div,dl,dt,dd,ul,ol,li,p,blockquote,pre,hr,figure,table,caption,th,td,form,fieldset,legend,input,button,textarea,menu{margin:0;padding:0;-webkit-tap-highlight-color:rgba(0,0,0,0);-webkit-box-sizing:border-box;box-sizing:border-box;-webkit-user-select:none;user-select:none;-webkit-text-size-adjust: none;text-size-adjust: none;}
    header,footer,section,article,aside,nav,address,figure,figcaption,menu,details{display:block;}
    table{border-collapse:collapse;border-spacing:0;}
    caption,th{text-align:left;font-weight:normal;}
    html,body,fieldset,img,iframe,abbr,a{border:none;-webkit-touch-callout: none;}
    i,cite,em,var,address,dfn{font-style:normal;}
    li,ol{list-style:none;}
    textarea,input,button,select{overflow:auto;resize:none;-webkit-user-select: text;user-select: text;outline: none;}
    a{text-decoration:none;color: #646464;}

    /*媒体查询*/
    html{font-size:125%;/*20px*/}
    @media only screen and (min-width: 401px){
        html {font-size:150%!important;/*24px*/}
    }
    @media only screen and (min-width: 428px){
        html {font-size:175%!important;/*28px*/}
        [class^="smh-icon-"],[class*=" smh-icon-"]{
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }
        @-webkit-keyframes Circle{
            from{-webkit-transform: rotate(0deg) scale(1.3);}
            to{-webkit-transform: rotate(360deg) scale(1.3);}
        }
    }
    @media only screen and (min-width:481px){
        html{font-size:200%!important;/*32px*/}
    }
    @media only screen and (min-width:569px){
        html{font-size:225%!important;/*36px*/}
    }
    @media only screen and (min-width:641px){
        html{font-size:250%!important;/*40px*/}
    }

    /*element style*/
    html,body{width: 100%;height: 100%}
    .app-container{
        position: absolute;
        top: 0;
        left:0;
        bottom: 0;
        right: 0;
    }

    /*start of app-header*/
    .app-header{
        position: absolute;
        top:0;
        left:0;
        height: 2.4rem;
        width: 100%; /*Q1为什么这里的宽度没有100%,而是要设置*/
        background-color:#008800 ;
    }

    /*start of app-wrap*/
    .app-wrap{
        position:absolute;
        bottom: 2.4rem;
        top:2.4rem;
        left:0;
        right: 0;
        overflow: hidden;
    }

    /*start of app-footer*/
    .app-footer{
        box-sizing:border;
        position: absolute;
        bottom:0;
        height: 2.4rem;
        width: 100%; /*Q1为什么这里的宽度没有100%,而是要设置*/
        background-color:#f5f9fa;
        border-top:1px solid #c2c6c7;
    }
</style>
@section('style')
    @show
<body>
@section('body')
    <div class="app-container">
        <div class="app-header">
        </div>
        <div class="app-wrap">
        </div>
        <div class="app-footer">
        </div>
    </div>
    @show
</body>
</html>