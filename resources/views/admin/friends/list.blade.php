@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>友链列表</span><el-button onclick="window.location.href='{{url('/boss/friends/add_friend')}}'" type="primary" class="pull-right" size="medium">添加友联</el-button></div>

        <div class="panel-body">
            <admin-friend-list></admin-friend-list>
        </div>
    </div>
@endsection