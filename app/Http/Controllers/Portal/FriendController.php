<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Common\PortalBaseController;
use App\Http\Requests\FriendRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class FriendController extends PortalBaseController
{
    public function create()
    {
        return view("portal.friends.create");
    }
    public function store(FriendRequest $request)
    {
        /*$this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);*/
//        $validator = Validator::make($request->all(), [
//            'email' => 'required',
//            'name' => 'required',
//            'url' => 'required',
//        ],['required'=>':attribute不能为空！'],["email"=>"邮箱"]);
//
//        if ($validator->fails()) {
//            return $this->sendFail($validator->errors()->first());
//        }
    }
}
