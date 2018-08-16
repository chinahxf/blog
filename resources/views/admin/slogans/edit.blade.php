@extends('admin.layout.home')

@section('content_admin')
    <div class="panel panel-default">
        <div class="panel-heading zl-close-float"><span>修改标语</span></div>

        <div class="panel-body">
            <admin-slogan-edit :item_id="{{$id}}"></admin-slogan-edit>
        </div>
    </div>a
@endsection
@section('')
@endsection