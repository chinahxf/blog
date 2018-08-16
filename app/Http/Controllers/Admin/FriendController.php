<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Model\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friend_list = Friend::paginate($this->limit);

        return $this->sendSuccess($friend_list);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all()['form_data'];

        $result = Friend::create($data);

        if ($result) {
            return $this->sendSuccess("", "添加成功！");
        }
        return $this->sendFail("添加失败！");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Friend::find($id);
        if ($result) {
            $friend = $result->toArray();
            return $this->sendSuccess($friend);
        }
        return $this->sendFail("没有找到该友链信息！");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all()['form_data'];
        $tags = [];


        $friend = Friend::find($id);
        $result = $friend->update($data);
        if (!$result) {
            return $this->sendFail("修改失败！");
        }
        return $this->sendSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id){
            return $this->sendFail("缺少参数");
        }

        $result=Friend::destroy($id);
        if ($result){
            return $this->sendSuccess("","删除友链成功！");
        }
    }
}
