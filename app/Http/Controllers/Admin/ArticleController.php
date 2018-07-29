<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Model\Article;
use App\model\Tag;
use Illuminate\Http\Request;

class ArticleController extends AdminBaseController
{
    /**
     * 文章列表
     * @return array
     */
    public function index(Request $request)
    {
        $articles = Article::query();
        if ($request->has('name')) {
            $articles->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->dates) {
            $articles->whereBetween('created_at', $request->get('dates'));
        }
        if ($request->category_id) {
            $articles->where('category_id',$request->category_id);
        }
        $article_list = $articles->paginate($this->limit);

        return $this->sendSuccess($article_list);

    }

    public function store(Request $request)
    {
        $data = $request->all()['form_data'];
        if ($data['tags']){
            $tags = [];
            foreach ($data['tags'] as $item){
                $tag = Tag::firstOrCreate(['name' => $item]);
                $tags[] = $tag->id;
            }
        }
        $result = Article::create($data);
        if ($tags){
            $result->tags()->attach($tags);
        }
        if ($result) {
            return $this->sendSuccess("", "添加成功！");
        }
        return $this->sendFail("添加失败！");

    }

    public function show($id = 0)
    {
        $result = Article::find($id);
        if ($result) {
//            $result->category_name = $result->categorys?$result->categorys->name:"";
            $article = $result->toArray();
            if ($result->has('tags')->count()){
                foreach ($result->tags as $item){
                    $article['tags'][] = $item->name;
                }
//                $tags = Tag::whereIn('id',$result->tags);
//                $article['tags'] = array_map(function(){
//
//                },$result->tags);
            }else{
                $article['tags'] = [];
            }


            return $this->sendSuccess($article);
        }
            return $this->sendFail("没有找到该文章信息！");

    }
    public function update($id=0,Request $request)
    {
        $data = $request->all()['form_data'];
        $tags = [];
        if ($data['tags']){
            foreach ($data['tags'] as $item){
                $tag = Tag::firstOrCreate(['name' => $item]);
                $tags[] = $tag->id;
            }
        }
        unset($data['tags']);
        $article = Article::find($id);
        $result = $article->update($data);
        if ($tags){
            $article->tags()->sync($tags);
        }
        if (!$result) {
            return $this->sendFail("修改失败！");
        }
        return $this->sendSuccess();
    }
    public function destroy($id=0)
    {
        if (!$id){
            return $this->sendFail("缺少参数");
        }
        $article = Article::find($id);
        $tag_result = $article->tags()->detach();
        $common_result = $article->comments()->delete();
        $result=Article::destroy($id);
        if ($result){
            return $this->sendSuccess("","删除文章成功！");
        }
    }

}
