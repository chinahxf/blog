@extends('portal.layout.home')
@section('content_portal')
    <div class="swiper-container" style="height: 400px;">
        <div class="swiper-wrapper">
            @if(isset($banners))
                @foreach($banners as $item)
                    <div class="swiper-slide"><a href="{{$item->to_url}}"><img src="{{$item->url}}" alt="{{$item->name}}"
                                                                               title="{{$item->name}}" style="width: 100%"/></a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @if(isset($slogan))
        <section class="zl-index-center">
            <p>{{$slogan->body_text}}</p>
        </section>
    @endif
    <div class="container">

        <h1 class="my-4">思考</h1>
        @if(isset($articles[1]))
            <div class="row">
                @foreach($articles[1] as $item)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="{{url("/articles/$item->article_id")}}"><img class="card-img-top"
                                                                                  src="{{$item->thumb_img}}" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{$item->name}}</a>
                                </h4>
                                <p class="card-text">{{$item->body_text}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <h2>杂文</h2>
        @if($articles[2])
            <div class="row">
                @foreach($articles[2] as $item)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="{{url("/articles/$item->article_id")}}"><img class="card-img-top"
                                                                                  src="{{$item->thumb_img}}" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{$item->name}}</a>
                                </h4>
                                <p class="card-text">{{$item->body_text}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@section('portal_script')
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: true,//可选选项，自动滑动
            width: window.innerWidth,
            height: 400
        })
    </script>
@endsection
<!-- /.container -->
@endsection

