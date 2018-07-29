@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>留言列表</span></div>

        <div class="panel-body">
            <admin-comment-list></admin-comment-list>
        </div>
    </div>
@endsection