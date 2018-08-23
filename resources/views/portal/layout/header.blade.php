<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark zl-nav">
    <div class="container">
        <a class="navbar-brand" href="{{url("index")}}" style="color: black;">生命与自然</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: green"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto zl-nav-ul">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}"><span class="zl-nav-font">首页</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/articles/list/1')}}"><span
                                class="zl-nav-font">思考</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/articles/list/2')}}"><span
                                class="zl-nav-font">杂文</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/articles/list/3')}}"><span
                                class="zl-nav-font">话题</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/articles/list/3')}}"><span
                                class="zl-nav-font">自然</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/friends/add_friend')}}"><span
                                class="zl-nav-font">友链</span></a>
                </li>
                {{--@guest--}}
                {{--<li class="nav-item">--}}

                {{--<a href="#">登陆</a>--}}

                {{--</li>--}}
                {{--@else--}}
                {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                {{--aria-haspopup="true" aria-expanded="false"><img src="http://placehold.it/25x25"--}}
                {{--class="rounded-circle"/></a>--}}
                {{--<div class="dropdown-menu">--}}

                {{--</div>--}}
                {{--</li>--}}
                {{--@endguest--}}

            </ul>
            @guest
                <span class="navbar-text">
                    <a href="#" class="zl-login-button" data-toggle="modal" data-target="#exampleModal">登录</a>
                    <a href="{{url('register')}}" class="zl-register-button">注册</a>
                </span>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <a href="{{url('/login')}}">邮箱登录</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{\Illuminate\Support\Facades\Auth::user()->photo}}" class="rounded-circle"/><span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span></a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">退出</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    @endguest
        </div>
    </div>
</nav>
