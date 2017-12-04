<?php

namespace App\Http\Controllers\Common;

use App\Model\Category;
use Illuminate\Http\Request;
use Qiniu\Auth;

class CommonController extends BaseController
{
    /**
     * 获取分类列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request)
    {
        $type = $request->get('type');

        $category = Category::query();

        if ($type) {
            $category->where('category_type',$type);
        }
        $result=$category->get();

        return $this->sendSuccess($result);

    }

    public function storeCategory(Request $request)
    {
        $data = $request->all();
        $result = Category::create($data);
            if($result){
                return $this->sendSuccess('','添加分类成功！');

            }else{
                return $this->sendFail('添加分类失败！');
            }
    }
    /**
     * 输出七牛的token
     * @return \Illuminate\Http\JsonResponse
     */
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
