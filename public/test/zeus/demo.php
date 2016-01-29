<?php

include_once 'JosClient.php';
include_once 'JosRequest.php';



$JOS = new JosClient();


$JOS->appKey = "ECC69A6E3132FA71872F4BE937183B3A";
$JOS->secretKey = "a681e6b6b96f44b48a155fc41304324d";
$JOS->gatewayUrl = "http://gw.api.360buy.com/routerjson";
$JOS->accessToken = "f2ceafd9654c";

echo "<pre>";
$req = new JosRequest();



$method = 'jingdong.ware.sku.search.list.get';

//示例2
$req->setApiMethod("jingdong.UnionOrderService.queryCommisions");
$req->setParas("time",2016010810);
$req->setParas("pageIndex", 1);
$req->setParas("pageSize", 10);
$req->setParas("unionId", 1000002381);
$r = $JOS->execute($req);
$req->clear(); //避免重复使用 $req，导致参数设置混乱
print_r($r);
echo "</pre>";



/*
     * 拼接数据
     */
function comdataurl($json, $method)
{
    $data['app_key'] = APP_KEY;
    $data['v'] = '2.0';
    $data['360buy_param_json'] = $json;
    $time = date("Y-m-d H:i:s", time());
    $data['timestamp'] = $time;
    $data['method'] = $method;
    ksort($data);

    $sign = APP_SECRET;
    foreach($data as $key=>$val)
    {
        $sign .= $key.$val;
    }
    $sign .= APP_SECRET;
    $sign = strtoupper(md5($sign));
    $data['sign'] = $sign;
    $data['timestamp'] = date("Y-m-d%20H:i:s", time());

    $url = "http://gw.api.jd.com/routerjson?";
    $inta = 0;
    foreach($data as $key=>$val)
    {
        if($inta)
        {
            $url .= "&";
        }
        $url .= $key."=".$val;
        $inta++;
    }
    return $url;
}