@extends('portal.layout.home')
@section('content_portal')
    <!-- First Container -->
    <div class="container-fluid bg-1 text-center">
        <h3 class="margin">koala</h3>
        <img src="{{asset("/images/homepage_head.jpg")}}" class="img-responsive img-circle margin"
             style="display:inline" alt="Bird" width="350"
             height="350">
        <h3>为爱打拼！</h3>
    </div>

    <!-- Second Container -->
    <div class="container-fluid bg-2 text-center">
        <h3 class="margin">What Am I?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. </p>
        <a href="#" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-search"></span> Search
        </a>
    </div>

    <!-- Third Container (Grid) -->
    <div class="container-fluid bg-3 text-center">
        <h3 class="margin">热门文章</h3><br>
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-4">
                    <p>{{$article->body_text}}</p>
                    <img src="{{$article->thumb_img}}?imageMogr2/gravity/Center/crop/300x350"
                         class="img-responsive margin" style="width:100%" alt="Image">
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection

