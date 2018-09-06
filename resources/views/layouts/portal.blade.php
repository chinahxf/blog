<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="生命,自然,思考,杂文">
    <meta name="description" content="社会节奏太快，是否能静下心来,思考一下关于自然,关于生命,关于身边发生的一切.">
    <meta name="author" content="hxf">
    <title>生命与自然</title>
    <link rel="shortcut icon" href="{{asset('images/head.png')}}" />
    <link href="{{asset('css/portal/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/portal/modern-business.css')}}" rel="stylesheet">
    <link href="{{asset('css/portal/portal.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/portal/swiper-4.2.6.min.css')}}">
    @yield('portal_style')
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?7d31f8b662134901bfc465e0b12f356a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body>
@yield('content')
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('js/swiper-4.2.6.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('portal_script')
</body>

</html>

