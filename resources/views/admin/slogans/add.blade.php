@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>添加标语</span></div>

        <div class="panel-body">
            <admin-slogan-add :category_id="{{$category_id}}"></admin-slogan-add>
        </div>
    </div>a
@endsection
@section('')
@endsection