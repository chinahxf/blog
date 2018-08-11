@extends('portal.layout.home')
@section('content_portal')
    <!-- Page Content -->
    <div class="zl-article-list-big-div container ">

        <ol class="breadcrumb zl-article-list-header">
            <li class="breadcrumb-item">当前位置:</li>
            <li class="breadcrumb-item">
                <a href="{{url('/')}}">首页</a>
            </li>
            <li class="breadcrumb-item active">{{$category_name}}</li>
        </ol>
    @foreach($list as $item)
        <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{url("/articles/$item->article_id")}}">
                                <img class="img-fluid rounded" src="{{$item->thumb_img}}?imageView2/1/w/750/h/300" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="card-title zl-article-list-title">{{$item->name}}</h4>
                            <p class="card-text">{{$item->body_text}}</p>
                            <a href="#" class="btn btn-success">查看详情&rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    作者：{{$item->users->name??''}}
                    时间：{{$item->createad_at}}
                    浏览量：{{$item->browse_num}}
                    标签：

                    @foreach($item->tags as $tag)
                        <a href="{{url("/tags/$tag->id")}}">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        @endforeach
        {{$list->appends(['category_id'=>1])->links('vendor.pagination.bootstrap-4')}}
    </div>
    </div>
    <!-- /.container -->
@endsection
