<?php

namespace App\Http\Controllers\Portal;

use App\Events\NewMessage;
use App\Http\Controllers\Common\PortalBaseController;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CommentController extends PortalBaseController
{
    //    public function index()
    //    {
    ////        event(new NewMessage());
    //        return view("portal.comments.list");
    //    }
    public function store(Request $request)
    {
        $data = $request->all();
        if (strlen($data['body_text']) > 100) {
            return $this->sendFail("字数超过上限！");
        }
        if (strlen($data['body_text']) == 0) {
            return $this->sendFail("评论不能为空！");
        }
        $id = Auth::id();
        if (!$id) {
            return $this->sendFail('小子你还没登陆呢！', '', '', 403);
        }
        $data['user_id'] = $id;
        //        $this->sendFail("",33,$data);
        $message = Comment::create($data);
        if ($message) {
            return $this->sendSuccess();
        }
        return $this->sendFail("添加失败！");
    }
}
