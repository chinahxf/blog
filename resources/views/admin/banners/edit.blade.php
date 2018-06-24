@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>添加banner</span></div>

        <div class="panel-body">
            <admin-banner-edit :item_id="{{$id}}"></admin-banner-edit>
        </div>
    </div>a
@endsection
@section('')
@endsection