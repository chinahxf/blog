@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>列表</span><el-button onclick="window.location.href='{{url('/boss/slogans/add_slogan/'.$category_id)}}'" type="primary" class="pull-right" size="medium">添加标语</el-button></div>

        <div class="panel-body">
            <admin-slogan-list :item_id="{{$category_id}}"></admin-slogan-list>
        </div>
    </div>
@endsection