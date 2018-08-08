@extends('portal.layout.home')
@section('content_portal')
    <div class="swiper-container" style="height: 400px;">
        <div class="swiper-wrapper">
            @foreach($banners as $item)
                <div class="swiper-slide"><a href="{{$item->to_url}}"><img src="{{$item->url}}" style="width: 100%"/></a></div>
            @endforeach
        </div>
    </div>
    <div class="container">

        <h1 class="my-4">思考</h1>
        @if(isset($articles[1]))
            <div class="row">
                @foreach($articles[1] as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                            <h4 class="card-header">{{$item->name}}</h4>
                            <div class="card-body">
                                <p class="card-text">{{$item->body_text}}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{url("/portal/articles/$item->article_id")}}" class="btn btn-primary">前往</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <h2>杂文</h2>
        @if($articles[2])
            <div class="row">
                @foreach($articles[1] as $item)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="{{$item->thumb_img}}" alt=""></a>
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
            height:400
        })
    </script>
@endsection
<!-- /.container -->
@endsection

