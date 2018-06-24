@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>列表</span><el-button onclick="window.location.href='{{url('/admin/banners/add_banner/'.$category_id)}}'" type="primary" class="pull-right" size="medium">添加banner</el-button></div>

        <div class="panel-body">
            <admin-banner-list :item_id="{{$category_id}}"></admin-banner-list>
        </div>
    </div>
@endsection