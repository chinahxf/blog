<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    {{--<!-- Search Widget -->--}}
    {{--<div class="card mb-4">--}}
    {{--<h5 class="card-header">Search</h5>--}}
    {{--<div class="card-body">--}}
    {{--<div class="input-group">--}}
    {{--<input type="text" class="form-control" placeholder="Search for...">--}}
    {{--<span class="input-group-btn">--}}
    {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="card my-4">
        <h5 class="card-header">公告</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    @if(isset($slogan))
                        {{$slogan->body_text}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">最新文章</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($article_r as $item)
                            <li>
                                <a href="{{url("/articles/$item->article_id")}}">{{$item->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4">
        <h5 class="card-header">最新评论</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($comment_r as $item)
                            <li>
                                <a href="{{url("/articles/$item->article_id")}}">{{$item->body_text}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">标签</h5>
        <div class="card-body">
            @foreach($tag_r->chunk(8) as $tag)
                @foreach($tag as $key=>$item)
                    <a class="btn btn-sm {{$tag_arr[$key]}}" href="{{url("/tags/$item->id")}}"
                       role="button">{{$item->name}}</a>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="card my-4">
        <h5 class="card-header">归档</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($articles as $item)
                            <li>
                                <a href="{{url("/articles/list?time=$item->time")}}">{{$item->time}}</a>({{$item->c}})
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4">
        <h5 class="card-header">友情链接</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($comment_r as $item)
                            <li>
                                <a href="{{url("/articles/$item->article_id")}}">{{$item->body_text}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>