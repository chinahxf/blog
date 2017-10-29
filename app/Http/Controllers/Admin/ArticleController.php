<?php

namespace App\Http\Controllers\Admin;

use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
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
        $article_list = $articles->paginate(7);

        return $article_list;
    }
    public function create(Request $request)
    {
        $data=$request->all()['form_data'];
        $result=Article::create($data);
        dd($result);

    }

}
