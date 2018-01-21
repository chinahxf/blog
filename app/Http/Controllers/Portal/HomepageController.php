<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends PortalBaseController
{
    private $number=3;
    public function index()
    {
        $articles=Article::get();
        $count=Article::count();
        if($count>=$this->number){
            $articles=$articles->random($this->number);
        }else{
            $articles=[];
        }

        return view('portal.index',compact('articles'));
    }
}
