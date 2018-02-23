<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Common\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if ($tmpstr == $signature) {
            echo $echostr;
            exit;
        }
    }
}
