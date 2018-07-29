@extends('portal.layout.home')
@section('content_portal')
    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<header class="text-center">--}}
    {{--<h3>{{$info->name}}</h3>--}}
    {{--<span class="glyphicon glyphicon-user" style="margin-left: 20px;"></span>--}}
    {{--<span>作者：{{$info->user_id}}</span>--}}
    {{--<span class="glyphicon glyphicon-time"></span>--}}
    {{--<span>修改时间：{{$info->updated_at}}</span>--}}
    {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
    {{--<span>浏览量：{{$info->browse_num}}</span>--}}
    {{--<span class="glyphicon glyphicon-duplicate"></span>--}}
    {{--<span>文章类型：{{$info->category_name}}</span>--}}
    {{--</header>--}}
    {{--<div class="col-md-4 col-md-offset-4" v-if="$info->thumb_img">--}}
    {{--<a href="{{$info->thumb_img}}" target="_blank"class="thumbnail">--}}
    {{--<img src="{{$info->thumb_img}}" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<p> {!! $info->body_html !!}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--@foreach($messages as $row)--}}
    {{--<div class="media zl-media-comment">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img class="media-object zl-portal-comment-head"--}}
    {{--src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=286704735,1295746168&fm=58">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<p class="media-heading"><span style="color: #ee542a;">{{$row->user_name}}</span>：</p>--}}
    {{--<p>{{$row->body_text}}</p>--}}
    {{--<p>{{$row->updated_at}}</p>--}}
    {{--@foreach($row["children"] as $item)--}}
    {{--<div class="media">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img class="media-object zl-portal-comment-head"--}}
    {{--src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=286704735,1295746168&fm=58">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<p class="media-heading"><span--}}
    {{--style="color: #ee542a;">{{$item->user_name}}</span><span>回复{{$item->to_user_name}}--}}
    {{--：</span>{{$item->body_text}}</p>--}}
    {{--<p>{{$item->updated_at}}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--@endforeach--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- Page Content -->
    <div class="container">

        {{--<!-- Page Heading/Breadcrumbs -->--}}
        {{--<h1 class="mt-4 mb-3">{{$info->name}}--}}
        {{--<small>by--}}
        {{--<a href="#">Start Bootstrap</a>--}}
        {{--</small>--}}
        {{--</h1>--}}


        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Page Heading/Breadcrumbs -->
                <h1 class="mt-4 mb-3">
                    {{$info->name}}
                </h1>
                <hr>

                <!-- Date/Time -->
                <p>
                    作者：{{$info->user_id}}
                    创建时间：{{$info->created_at}}
                    浏览量：{{$info->browse_num}}
                    文章类型：{{$info->category_name}}

                </p>

                <hr>
                {!! $info->body_html !!}
                <hr>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">评论:</h5>
                    <div class="card-body">
                        <div class="form-group">
                            @guest
                                <textarea class="form-control" rows="3" disabled="disabled"
                                          placeholder="请先登录后发表评论"></textarea>
                                <button type="button" class="btn btn-primary not-login zl-common-button">Submit</button>
                                @else
                                    <textarea class="form-control" rows="3"></textarea>
                                    <button type="button" class="btn btn-primary common-button zl-common-button"
                                            data-touserid="" data-parentid="">Submit
                                    </button>
                                    @endguest
                        </div>
                    </div>
                </div>
                @foreach($comments as $row)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/60x60" alt="">
                        <div class="media-body">
                            <h5 class="mt-0 zl-clean-mg-d">{{$row->user_name}}</h5>
                            {{$row->body_text}}
                            <footer class="zl-common-foot">时间：2018-06-12 <a href="javascript:void(0);"
                                                                            class="message-huifu">回复</a></footer>
                            <div class="card-body zl-common-text">
                                <div class="form-group">
                                    @guest
                                        <textarea class="form-control" rows="3" disabled="disabled"
                                                  placeholder="请先登录后发表回复"></textarea>
                                        <button type="button" class="btn btn-primary not-login zl-common-button"
                                                data-touserid="{{$row->user_id}}" data-parentid="{{$row->message_id}}">
                                            Submit
                                        </button>
                                        @else
                                            <textarea class="form-control" rows="3"></textarea>
                                            <button type="button" class="btn btn-primary common-button zl-common-button"
                                                    data-touserid="{{$row->user_id}}"
                                                    data-parentid="{{$row->message_id}}">
                                                Submit
                                            </button>
                                            @endguest

                                </div>
                            </div>
                            @foreach($row["children"] as $item)
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/60x60" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0 zl-clean-mg-d">{{$item->user_name}}
                                            :@ {{$item->to_user_name}}</h5>
                                        {{$item->body_text}}
                                        {{--<p><small>时间：2018-06-12</small></p>--}}
                                        <footer class="zl-common-foot">时间：2018-06-12 <a href="javascript:void(0);"
                                                                                        class="message-huifu">回复</a>
                                        </footer>
                                        <div class="card-body zl-common-text">
                                            <div class="form-group">
                                                @guest
                                                    <textarea class="form-control" rows="3" disabled="disabled"
                                                              placeholder="请先登录后发表回复"></textarea>
                                                    <button type="button"
                                                            class="btn btn-primary not-login zl-common-button"
                                                            data-touserid="{{$item->user_id}}"
                                                            data-parentid="{{$row->message_id}}">Submit
                                                    </button>
                                                    @else
                                                        <textarea class="form-control" rows="3"></textarea>
                                                        <button type="button"
                                                                class="btn btn-primary common-button zl-common-button"
                                                                data-touserid="{{$item->user_id}}"
                                                                data-parentid="{{$row->message_id}}">Submit
                                                        </button>
                                                        @endguest

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            @include('portal.layout.right');
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
@section("portal_script")
    <script>
        $(".message-huifu").click(function () {
            $(".zl-common-text").not($(this).parent().next()).css("display", "none")
            $(this).parent().next().css("display", "block");
        })
        $(".common-button").click(function () {
            var article_id = "{{$info->article_id}}";
            var to_user_id = $(this).data("touserid");
            var body_text = $(this).prev().val();
            var parent_id = $(this).data("parentid");
            $.ajax({
                url: "{{url('/portal/message')}}",
                type: "post",
                data: {
                    article_id: article_id,
                    category_id: 6,
                    to_user_id: to_user_id,
                    body_text: body_text,
                    parent_id: parent_id
                },
                success: function (data) {
                    console.log(data);
                    if (data.ret == 0) {
                        location.reload();
                    }
                }
            })
        })
        $(".not-login").click(function () {
            alert("小子你还没登陆呢！");
        })
    </script>
@endsection
