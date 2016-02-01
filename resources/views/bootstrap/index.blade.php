<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<style>
    .sytipbox input{width:70%;font-size: 14px;margin-left:12px;}
    .sytipbox ul{margin-left:12px;}

    .sytipbox ul li a:hover {color:#B3BBC3;}
    .sytipbox ul li{line-height: 22px; color: #667C6E; background: #C7DA76; padding: 0px 5px; float: left; height: 22px; border: 1px solid #B7C963; margin:0 10px 10px 0; border-radius:3px; cursor:default; display:inline; white-space: nowrap;}
</style>
<script src="/js/sytips.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">开心保洁服务有限公司-后台管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">统计</a></li>
                <li><a href="#">录入</a></li>
                <li><a href="#">员工</a></li>
                <li><a href="#">设置</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>
<div style="padding-top: 100px">
<table class="table table-bordered" style="max-width: 640px">
    <thead>
    <tr>
        <th>员工</th>
        <th>客户姓名</th>
        <th>应收金额</th>
        <th>合计</th>
        <th>合计X0.8</th>
        <th>分摊</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><div class="sytips" id="employee"></div></td>
        <td><div class="sytips" id="customer"></div></td>
        <td><div class="sytips" id="customer-cash"></div></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>
    </div>
<style>
    .icp-info span{color:#eeeeee}
    footer .ego{overflow: hidden;margin-top: 12px;}
    footer .ego .pic1{
        width: 26px;
        display: block;
        float: left;
        height: 26px;
        background: url('/image/zhuyan_logo_26.png') no-repeat;
        margin-right: 20px;
    }
</style>
<footer style="background-color: #333333;padding:36px 12px;">
    <div class="icp-info"><span>开心保洁</span><span>版权所有</span>&nbsp;&nbsp;<span>2015-{{date('Y')}}</span>&nbsp;&nbsp;<span>ICP证：蜀15014432号-1</span></div>
    <div class="ego"><a class="pic1"></a></div>
</footer>
</body>
<script>
    $(function(){
        var onContentChangeEvent = function fill_auto()
        {
            console.log(1);
//            var enames = $("#employee  li").length;//获取员工的长度
//            var incomings = 0;
//
//            $("#customer-cash li").each(function ()
//            {
//                var cao = parseInt($(this).text().replace("×",""));
//                incomings = incomings + cao;
//            });
//            var salary_deducted = incomings * 0.8;
//            $("#salary-percent").text(salary_deducted);
//            $("#salary-sum").text(incomings);
//            if(enames == 0)
//            {
//                $("#salary-avg").text(salary_deducted);
//            }else{
//                var deducted = salary_deducted/enames;
//                deducted =  deducted.toFixed(1);
//                $("#salary-avg").text(deducted);
//            }
//            console.log(incomings);
        };


        $("#employee").sytips({
            txt : '添加标签',
            onContentChangeEvent : onContentChangeEvent
        });
        $("#customer").sytips({
            txt : '添加标签',
            onContentChangeEvent : onContentChangeEvent
        });
        $("#customer-cash").sytips({
            txt : '添加标签',
            onContentChangeEvent : onContentChangeEvent
        });
    });
</script>
</html>