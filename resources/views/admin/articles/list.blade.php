@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading">文章列表</div>

        <div class="panel-body">
            <admin-article-list></admin-article-list>
        </div>
    </div>
@endsection