<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends PortalBaseController
{
    public function list()
    {
        $list = Article::paginate(15);
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
        $message_all = $info->messages()->get();
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
                $item->children=$childrens;
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
