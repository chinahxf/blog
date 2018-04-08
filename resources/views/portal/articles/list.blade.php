@extends('portal.layout.home')
@section('content_portal')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blog Home Two
            <small>Subheading</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
    @foreach($list as $item)
        <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{url("/portal/articles/info?id=$item->article_id")}}">
                                <img class="img-fluid rounded" src="{{$item->thumb_img}}?imageView2/1/w/750/h/300" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{$item->name}}</h2>
                            <p class="card-text">{{$item->body_text}}</p>
                            <a href="#" class="btn btn-primary">查看详情&rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    分类：{{$item->category_name}}
                    作者：{{$item->users->name}}
                    时间：{{$item->createad_at}}
                    浏览量：{{$item->browse_num}}
                </div>
            </div>
        @endforeach
        {{$list->appends(['category_id'=>1])->links('vendor.pagination.bootstrap-4')}}
    </div>
    </div>
    <!-- /.container -->
@endsection
