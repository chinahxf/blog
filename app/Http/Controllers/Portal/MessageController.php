<?php

namespace App\Http\Controllers\Portal;

use App\Events\NewMessage;
use App\Http\Controllers\Common\PortalBaseController;
use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class MessageController extends PortalBaseController
{
    public function index()
    {
        event(new NewMessage());
        return view("portal.messages.list");
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if (strlen($data['body_text']) > 100 ) {
            return $this->sendFail("字数超过上限！");
        }
        if (strlen($data['body_text']) == 0 ) {
            return $this->sendFail("评论不能为空！");
        }
        $id = Auth::id();

        $data['user_id'] = $id;
//        $this->sendFail("",33,$data);
        $message = Message::create($data);
        if($message){
            return $this->sendSuccess();
        }
        return $this->sendFail("添加失败！");
    }
}
