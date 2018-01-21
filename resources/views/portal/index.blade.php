@extends('portal.layout.home')
@section('content_portal')
    <!-- First Container -->
    <div class="container-fluid bg-1 text-center">
        <h3 class="margin">koala</h3>
        <img src="{{asset("/images/homepage_head.jpg")}}" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350"
             height="350">
        <h3>如果不是为了生存！</h3>
    </div>

    <!-- Second Container -->
    <div class="container-fluid bg-2 text-center">
        <div class="row">
            <div class="col-sm-3">
                <h2>浏览人数</h2>
                <h3>234235</h3>
            </div>
            <div class="col-sm-3">
                <h2>注册人数</h2>
                <h3>234235</h3>
            </div>
            <div class="col-sm-3">
                <h2>点赞人数</h2>
                <h3>234235</h3>
            </div>
            <div class="col-sm-3">
                <h2>分享人数</h2>
                <h3>234235</h3>
            </div>

        </div>
    </div>

    <!-- Third Container (Grid) -->
    <div class="container-fluid bg-3 text-center">
        <h3 class="margin">热门文章</h3><br>
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-4">
                    <p>{{$article->body_text}}</p>
                    <img src="{{$article->thumb_img}}?imageMogr2/gravity/Center/crop/300x350" class="img-responsive margin" style="width:100%" alt="Image">
                </div>
                @empty
                @endforelse
        </div>
    </div>
@endsection
