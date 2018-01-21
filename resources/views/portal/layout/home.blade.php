@extends('layouts.portal')

@section('content')
            @include('portal.layout.header')
            @yield('content_portal')
            @include('portal.layout.footer')
@endsection



