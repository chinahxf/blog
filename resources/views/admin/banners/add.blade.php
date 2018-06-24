@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>添加banner</span></div>

        <div class="panel-body">
            <admin-banner-add :category_id="{{$category_id}}"></admin-banner-add>
        </div>
    </div>a
@endsection
@section('')
@endsection