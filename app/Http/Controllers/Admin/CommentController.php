<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends AdminBaseController
{
//    public function getMessageList()
//    {
//        return view('admin.messages.list');
//    }
//    public function categoryMessage()
//    {
//        return view('admin.messages.category');
//    }

    public function index(Request $request)
    {
        $messages = Comment::query();
        if ($request->has('body_text')) {
            $messages->where('body_text', 'like', '%' . $request->body_text . '%');
        }
        if ($request->dates) {
            $messages->whereBetween('created_at', $request->get('dates'));
        }
        if ($request->category_id) {
            $messages->where('category_id',$request->category_id);
        }
        $message_list = $messages->paginate($this->limit);

        return $this->sendSuccess($message_list);
    }
    public function show($id = 0)
    {
        $result = Comment::find($id);
        if ($result) {
            $message = $result->toArray();
        } else {
            return $this->sendFail("没有找到该留言！");
        }
        return $this->sendSuccess($message);
    }
    public function destroy($id=0)
    {
        $result=Comment::destroy($id);
        Comment::where('parent_id',$id)->delete();
        if ($result){
            return $this->sendSuccess("","删除留言成功！");
        }
    }
}
