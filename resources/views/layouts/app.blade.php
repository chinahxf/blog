<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
    {{--<script src="https://cdn.staticfile.org/plupload/2.1.9/plupload.full.min.js"></script>--}}
    {{--<script src="https://cdn.staticfile.org/qiniu-js-sdk/1.0.14-beta/qiniu.min.js"></script>--}}
    {{--<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>--}}
    <style>
        html,body{
            font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">

        @yield('content')
    </div>
    {{--<script src="{{asset('plugin/jquery-3.2.1.min.js')}}"></script>--}}
    <script src="{{asset('plugin/plupload.full.min.js')}}"></script>
    <script src="{{asset('plugin/qiniu.min.js')}}"></script>
    <!-- Scripts -->
    {{--<script src="{{ asset('/js/manifest.js') }}"></script>--}}
    {{--<script src="{{ asset('/js/vendor.js') }}"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
