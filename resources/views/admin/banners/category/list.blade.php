@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>banner类型</span><el-button onclick="window.location.href='{{url('/admin/banners/add_article')}}'" type="primary" class="pull-right" size="medium">添加banner类型</el-button><el-button onclick="window.location.href='{{url('/admin/categorys/add_banner/')}}'" type="primary" class="pull-right" size="medium">添加banner</el-button></div>

        <div class="panel-body">
            <admin-banner-category></admin-banner-category>
        </div>
    </div>
@endsection