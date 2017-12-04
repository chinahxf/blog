@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>文章详情</span></div>

        <div class="panel-body">
            <admin-article-edit :item_id="{{$id}}"></admin-article-edit>
        </div>
    </div>
@endsection
@section('')
@endsection