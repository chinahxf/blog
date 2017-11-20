@extends('layouts.app')

@section('content')
    <div class="zl-admin-row row">
        <div class="col-md-2 zl-col-md-2">
            @include('admin.layout.nav')
        </div>
        <div class="col-md-10 zl-col-md-10">
            @yield('content_admin')
        </div>
    </div>
@endsection
