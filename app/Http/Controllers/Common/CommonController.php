<?php

namespace App\Http\Controllers\Common;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function getCategory(Request $request)
    {
        $type = $request->get('type');

        $category = Category::query();

        if ($type) {
            $category->where('category_type',$type);
        }

        return $category->get();
    }
}
