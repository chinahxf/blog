@extends('portal.layout.home')
@section('content_portal')
    <div class="container-fluid">
        <div class="row">
            <header class="text-center">
                <h3>{{$info->name}}</h3>
                <span class="glyphicon glyphicon-user" style="margin-left: 20px;"></span>
                <span>作者：{{$info->user_id}}</span>
                <span class="glyphicon glyphicon-time"></span>
                <span>修改时间：{{$info->updated_at}}</span>
                <span class="glyphicon glyphicon-eye-open"></span>
                <span>浏览量：{{$info->browse_num}}</span>
                <span class="glyphicon glyphicon-duplicate"></span>
                <span>文章类型：{{$info->category_name}}</span>
            </header>
            {{--<div class="col-md-4 col-md-offset-4" v-if="$info->thumb_img">
                <a href="{{$info->thumb_img}}" target="_blank"class="thumbnail">
                    <img src="{{$info->thumb_img}}" alt="">
                </a>
            </div>--}}
            <div class="col-md-8 col-md-offset-2">
                <p> {!! $info->body_html !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($messages as $row)
                    <div class="media zl-media-comment">
                        <a class="pull-left" href="#">
                            <img class="media-object zl-portal-comment-head" src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=286704735,1295746168&fm=58">
                        </a>
                        <div class="media-body">
                            <p class="media-heading"><span style="color: #ee542a;">{{$row->user_name}}</span>：</p>
                            <p>{{$row->body_text}}</p>
                            <p>{{$row->updated_at}}</p>
                            @foreach($row["children"] as $item)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object zl-portal-comment-head" src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=286704735,1295746168&fm=58">
                                </a>
                                <div class="media-body">
                                    <p class="media-heading"><span style="color: #ee542a;">{{$item->user_name}}</span><span>回复{{$item->to_user_name}}：</span>{{$item->body_text}}</p>
                                    <p>{{$item->updated_at}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @endforeach

            </div>
        </div>
    </div>

@endsection
