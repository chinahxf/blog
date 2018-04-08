<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/portal/articles/list?category_id=1')}}">新闻</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">活动</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">思考</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">个人</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="http://placehold.it/25x25" class="rounded-circle"/></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">退出</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
