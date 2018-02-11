@extends('portal.layout.home')
@section('content_portal')
    <div class="container-fluid">
        <div class="row">
            @foreach($list as $item)

                <div class="col-md-8 col-md-offset-2 zl-portal-article-list">
                    <a href="{{url("/portal/articles/info?id=$item->article_id")}}">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=""/>
                            </div>
                            <div class="col-md-9">
                                <h4>你是我的宝贝</h4>
                                <p>我爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你爱你</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-8 col-md-offset-2 text-center">
                {{$list->links()}}
            </div>
        </div>
    </div>
    </div>
@endsection
