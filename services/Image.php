<?php
namespace Services;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class Image{
    /**
     * 保存微信多媒体信息文件，主要是图片的上传保存
     * @param string $mediaId 文件标识
     * @return mixed
     */
    static public function saveWeChatMedia($mediaId){
        $token = \WechatCallback::getAccessToken();
        $url = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='
            . $token . '&media_id=' . $mediaId;

        Log::info('weixin_accessToken:' . $token);
        Log::info('weixin_pic:' . $mediaId);
        //这里只所以没用curl类，是因为要获取curl_getinfo，而我们的curl类只能获取curl_exec
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_NOBODY,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
        curl_close($ch);


        // 这里如果获取图片出错，那么则要提示
        $response = json_decode($package,true);
        if(isset($response['errcode'])){
            Log::info('imageDownLoadErr:' . $package);
            return array('status'=>false,'data'=>'服务端获取图片异常');
        }

        $imageAll = array_merge(array('header'=>$httpinfo),array('body'=>$package));

        /**
         * 所有图片都以jpg结尾，如果是其它格式图片，被转换后概不负责
         */
        $pathSuffix = self::mk_path();
        $filenameSuffix =  $pathSuffix . '/' . time() . '.jpg';
        $filename = public_path() . $filenameSuffix;

        $local_file = fopen($filename,'w');
        if(false !== $local_file){
            if(false != fwrite($local_file,$imageAll['body'])){
                fclose($local_file);
                return $filenameSuffix;
            }
        }

    }



        /**
     * 保存微信多媒体信息文件，主要是图片的上传保存
     * @param string $mediaId 文件标识
     * @return mixed
     */
    static public function saveStudentWeChatMedia($mediaId){
        require_once app_path() . '/kits/wechat/AccessToken.class.php';
        $token = AccessToken::getAccessToken();
        $url = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='
            . $token . '&media_id=' . $mediaId;

        Log::info('weixin_accessToken:' . $token);
        Log::info('weixin_pic:' . $mediaId);
        //这里只所以没用curl类，是因为要获取curl_getinfo，而我们的curl类只能获取curl_exec
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_NOBODY,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
        curl_close($ch);
        $imageAll = array_merge(array('header'=>$httpinfo),array('body'=>$package));

        // 这里如果获取图片出错，那么则要提示
        $response = json_decode($package,true);
        if(isset($response['errcode'])){
            Log::info('imageDownLoadErr:' . $package);
            return array('status'=>false,'data'=>'服务端获取图片异常');
        }
        /**
         * 所有图片都以jpg结尾，如果是其它格式图片，被转换后概不负责
         */
        $pathSuffix = self::mk_path();
        $filenameSuffix = $pathSuffix . '/' . time() . '.jpg';
        $filename = public_path() . $filenameSuffix;

        $local_file = fopen($filename,'w');
        if(false !== $local_file){
            if(false != fwrite($local_file,$imageAll['body'])){
                fclose($local_file);
                return $filenameSuffix;
            }
        }
    }

    /**
     * 模拟保存传过来的图片
     * @param $resourceName
     * @param $fileContent
     * @return mixed
     */
    static public function saveResourcePic($resourceName,$fileContent){
        $filenameSuffix = '/downloads/' . $resourceName .time() . '.jpg';
        $filename = public_path() . $filenameSuffix;

        $local_file = fopen($filename,'w');
        if(false !== $local_file){
            if(false != fwrite($local_file,$fileContent)){
                fclose($local_file);
                return $filenameSuffix;
            }
        }
    }

    //检测图片文件夹
    static protected function mk_path() {
        $pathSuffix = '/uploads/m/certification/' . date("Y-m-d");
        $dirpath = public_path() . $pathSuffix;
        if (!file_exists($dirpath)) {
            if (!mkdir($dirpath, 2770, true)) {
                return FALSE;
            }
        }
        return $pathSuffix;
    }
}