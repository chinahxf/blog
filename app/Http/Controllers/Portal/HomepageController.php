<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Model\Article;
use App\Model\Banner;

class HomepageController extends PortalBaseController
{
    private $number = 3;

    public function index()
    {
        $articles = [];
        $articles[1] = Article::where('category_id', 1)->take($this->number)->get();
        $articles[2] = Article::where('category_id', 2)->take($this->number)->get();
        $banners = Banner::where('category_id', 5)->get();

        return view('portal.index', compact('articles', 'banners'));
    }
}
