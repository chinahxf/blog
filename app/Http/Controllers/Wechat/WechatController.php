<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Common\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WechatController extends BaseController
{
    public function index(Request $request)
    {
        $timestamp = $request->get("timestamp");
        $nonce = $request->get("nonce");
        $signature = $request->get("signature");
        $echostr = $request->get("echostr");
        $token = env("WECHAT_TOKEN");
        $wechat_arr = [$timestamp, $nonce, $token];
        sort($wechat_arr);
        $tmpstr = join("", $wechat_arr);
        $tmpstr = sha1($tmpstr);
        if ($tmpstr == $signature && $echostr) {
            Log::info($echostr);
            Log::info("第一次验证");
            echo $echostr;
            exit;
        }else{
            Log::info("关注");
            $this->reponseMsg();

        }
    }

    public function reponseMsg()
    {
        Log::info("aaaaa");
        $postXml = $GLOBALS("HTTP_RAW_POST_DATA");
        Log::info($postXml);
//        ToUserName	开发者微信号
//FromUserName	发送方帐号（一个OpenID）
//CreateTime	消息创建时间 （整型）
//MsgType	消息类型，event
//Event	事件类型，subscribe(订阅)、unsubscribe(取消订阅)
        $postObj = simplexml_load_string($postXml);
        if (strtolower($postObj->MsgType) == "event") {
            if (strtolower($postObj->Event) == "subscribe") {
//ToUserName	是	接收方帐号（收到的OpenID）
//FromUserName	是	开发者微信号
//CreateTime	是	消息创建时间 （整型）
//MsgType	是	text
//Content	是	回复的消息内容（换行：在content中能够换行，微信客户端就支持换行显示）

                $fromUserName = $postObj->ToUserName;
                $toUserName = $postObj->FromUserName;
                $createTime = time();
                $msgType = "text";
                $content = "敌军还有30秒抵达战场，请做好准备！";
                $template = "<xml>
                                <ToUserName>< ![CDATA[%s] ]></ToUserName> 
                                <FromUserName>< ![CDATA[%s] ]></FromUserName> 
                                <CreateTime>%s</CreateTime> 
                                <MsgType>< ![CDATA[%s] ]></MsgType> 
                                <Content>< ![CDATA[%s] ]></Content> 
                              </xml>";
                $info = sprintf($template,$toUserName,$fromUserName,$createTime,$msgType,$content);
                echo $info;
            } else {

            }
        }

    }
}
