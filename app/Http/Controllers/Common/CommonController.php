<?php

namespace App\Http\Controllers\Common;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Auth;

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
    public function getQiNiuToken()
    {
        $accessKey=config('filesystems.disks.qiniu.access_key');
        $secretKey=config('filesystems.disks.qiniu.secret_key');
        $bucket=config('filesystems.disks.qiniu.bucket');

        $auth = new Auth($accessKey, $secretKey);
        $upToken = $auth->uploadToken($bucket);
//dd("{$upToken}");
//        return "$upToken";
        return response()->json(['uptoken'=>$upToken]);
    }
}
