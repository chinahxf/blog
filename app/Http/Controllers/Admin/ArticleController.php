<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Model\Article;
use Illuminate\Http\Request;

class ArticleController extends AdminBaseController
{
    /**
     * 文章页面跳转
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleList()
    {
        return view('admin.articles.list');
    }

    public function addArticle()
    {
        return view('admin.articles.add');
    }

    public function detailArticle($id = 0)
    {
        return view('admin.articles.detail', ['id' => $id]);
    }

    public function editArticle($id = 0)
    {
        return view('admin.articles.edit', ['id' => $id]);
    }

    public function categoryArticle()
    {
        return view("admin.articles.category");
    }
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

    public function create(Request $request)
    {
        $data = $request->all()['form_data'];
        $result = Article::create($data);
        if ($result) {
            return $this->sendSuccess("", "添加成功！");
        }
        return $this->sendFail("添加失败！");

    }

    public function show($id = 0)
    {
        $result = Article::find($id);
        if ($result) {
            $article = $result->toArray();
        } else {
            return $this->sendFail("没有找到该文章信息！");
        }
        return $this->sendSuccess($article);
    }
    public function update($id=0,Request $request)
    {
        $data = $request->all()['form_data'];
        $result = Article::where("article_id", $id)->update($data);
        if (!$result) {
            return $this->sendFail("修改失败！");
        }
    }
    public function destroy($id=0)
    {
        $result=Article::destroy($id);

        if ($result){
            return $this->sendSuccess("","删除文章成功！");
        }
    }

}
