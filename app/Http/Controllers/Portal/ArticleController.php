<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Mail\CommentSendMail;
use App\Model\Article;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Slogan;
use App\model\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ArticleController extends PortalBaseController
{
    public function list($id = false, Request $request)
    {
        $query = Article::query();

        if ($id) {
            $query->where("category_id", $id);
            $category_name = Category::find($id)->name;
        }
        $time = $request->get('time');

        if ($time){
            $category_name="$time";
            $query->where("created_at", 'LIKE','%'.$time.'%');
        }
        //Log::info("aaa");
        //$message = (new CommentSendMail())->onQueue("email");
        //Mail::to("894847066@qq.com")->queue($message);
        $list = $query->with("tags")->paginate(15);

        return view("portal.articles.list", compact('list','category_name'));
    }

    public function info($id = false,Request $request)
    {
//        $id = $request->get("id");
        if (!$id) {
            abort(404);
        }
        $info = Article::find($id);

        $ip = $request->getClientIp();
        $ip_key = "A_B_N" . str_replace(".", "", $ip);
        if (Cache::has($ip_key)) {
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

        $comment_all = $info->comments()->get();
        $comments = [];
        foreach ($comment_all as $item) {
            if ($item->parent_id == "") {
                $childrens = [];
                foreach ($comment_all as $row) {
                    if ($item->comment_id == $row->parent_id) {
                        $row->user_name = $row->fromUsers->name ?? "";
                        $row->to_user_name = $row->toUsers->name ?? "";
                        $childrens[] = $row;
                    }

                }
                $item->children = $childrens;
                $item->user_name = $item->fromUsers->name ?? "";
                //                $item->to_user_name=$item->toUsers->name??"";
                //                $item->children=$childrens;
                $comments[] = $item;
            }
        }
        $slogan = Slogan::where("category_id",8)->first();
        $article_tags = $info->tags()->get();
        $article_r = Article::select('name', 'article_id')->orderBy('created_at', 'desc')->take(10)->get();
        $comment_r = Comment::select('body_text', 'article_id', 'created_at')->orderBy('created_at', 'desc')->take(10)->get();
        $tag_r = Tag::select('name', 'id')->orderBy('created_at', 'desc')->take(10)->get();
        $articles = Article::selectRaw('DATE_FORMAT(created_at,"%Y-%m-%d") as time,count(0) as c')->groupBy('time')->get();

        return view("portal.articles.info", compact("info", "comments", "article_r", 'comment_r', 'tag_r','articles','article_tags','slogan'));
    }
}
