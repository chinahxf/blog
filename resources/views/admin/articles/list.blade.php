@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>文章列表</span><el-button onclick="window.location.href='{{url('/boss/articles/add_article')}}'" type="primary" class="pull-right" size="medium">添加文章</el-button></div>

        <div class="panel-body">
            <admin-article-list></admin-article-list>
        </div>
    </div>
@endsection