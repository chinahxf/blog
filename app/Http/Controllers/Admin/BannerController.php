<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Model\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends AdminBaseController
{
    public function categoryBanner()
    {
        return view('admin.banners.category.list');
    }
    public function getBannerList($category_id)
    {
        return view('admin.banners.list',compact("category_id"));
    }
    public function createBanner($category_id)
    {
        return view('admin.banners.add',compact("category_id"));
    }
    public function editBanner($id)
    {
        return view('admin.banners.edit',compact("id"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $query = Banner::query();
        if ($id){
            $query = $query->where("category_id",$id);
        }
//        $banner_list = Banner::get();
        $banner_list = $query->paginate($this->limit);

        return $this->sendSuccess($banner_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all()['form_data'];
        //        return $this->sendResult("","",$data);
        $result = Banner::create($data);
        if ($result) {
            return $this->sendSuccess("","添加成功！");
        }
        return $this->sendFail('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banners = Banner::find($id);
        if ($banners){
            return $this->sendSuccess($banners);
        }
        return $this->sendFail("获取失败！");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all()['form_data'];
        $result = Banner::where("banner_id", $id)->update($data);
        if (!$result) {
            return $this->sendFail("修改失败！");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
