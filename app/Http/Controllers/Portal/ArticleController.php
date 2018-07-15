<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Mail\CommentSendMail;
use App\Model\Article;
use App\Model\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ArticleController extends PortalBaseController
{
    public function list($id=false,Request $request)
    {
        $query = Article::query();
        if ($id){
            $query->where("category_id",$id);
        }
//Log::info("aaa");
//        $message = (new CommentSendMail())->onQueue("email");
//        Mail::to("894847066@qq.com")->queue($message);
        $list = $query->paginate(15);
//dd($list);
        return view("portal.articles.list",compact('list'));
    }
    public function info(Request $request)
    {
        $id = $request->get("id");
        if (!$id) {
            abort(404);
        }
        $info = Article::find($id);

            $ip = $request->getClientIp();
            $ip_key = "A_B_N".str_replace(".","",$ip);
            if (Cache::has($ip_key)){
                $value = Cache::get($ip_key);
                if ($value && !in_array($id, $value)) {
                    $value[] = $id;
                    $info->browse_num = $info->browse_num + 1;
                    $info->save();
                }
            } else {
                $value[] = $id;
                $info->browse_num = $info->browse_num + 1;
                $info->save();
            }
        if ($value != Cache::get($ip_key)) {
            Cache::put($ip_key, $value, 1);
        }

        $message_all = $info->messages()->get();
        $messages = [];
        foreach($message_all as $item){
            if ($item->parent_id==""){
                $childrens=[];
                foreach($message_all as $row){
                    if ($item->message_id==$row->parent_id){
                        $row->user_name=$row->fromUsers->name??"";
                        $row->to_user_name=$row->toUsers->name??"";
                        $childrens[]=$row;
                    }

                }
                $item->children=$childrens;
                $item->user_name=$item->fromUsers->name??"";
//                $item->to_user_name=$item->toUsers->name??"";
//                $item->children=$childrens;
                $messages[]=$item;
            }
        }
/*        $message_all = $info->messages()->get()->toArray();
        foreach($message_all as $item){
            $item["user_name"]=
            if ($item['parent_id']==""){
                $messages['article_comment'][]=$item;
            }else{
                $messages[$item['parent_id']][]=$item;
            }
        }
        foreach($messages['article_comment'] as $key=>$val){
            $messages['article_comment'][$key]["children"] = $messages[$val['message_id']]??[];
        }
        $messages=$messages['article_comment'];*/

//        $depth_max = $info->messages()->max("depth");
//        for($i=0;$i<$depth_max;$i++){
//            $depth_all[$i]=[];
//        }
////       $m= $this->deeploop($message_all);
////        dd($depth_max);
//        foreach($message_all as $item){
//            foreach($depth_all as $k=>$a){
//                if($item['depth']==$k){
//                    $depth_all[$k][]=$item;
//                }
//
//            }
//
//
//        }
        /*for($i=0;$i<$depth_max;$i++){
            foreach($message_all as $item){
                if($item["depth"]==$i+1){
                    $item["children"]=$item;
                }
            }
        }*/
//        dd($messages);
        return view("portal.articles.info",compact("info","messages"));
    }
}
