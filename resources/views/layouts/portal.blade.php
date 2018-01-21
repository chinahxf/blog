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
    <link href="//maxcdn.bootstrapcdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="{{asset('css/portal/portal.css')}}" rel="stylesheet">

</head>
<body>
        @yield('content')
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
        <script src="//ajax.googleapis.bootcss.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
