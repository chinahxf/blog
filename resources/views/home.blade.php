@extends('layouts.app')

@section('content')
<div class="container zl-admin-container">
    <div class="row">
        <div class="col-md-2 zl-col-md-2">
            @include('admin.layout.nav')
        </div>
        <div class="col-md-10 zl-col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @yield('content_admin')
                    {{--<example></example>--}}
                    {{--@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
