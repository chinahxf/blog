@extends('portal.layout.home')
@section('content_portal')
    <div class="container-fluid">
        <div class="row">
dddd
            {{--<div class="col-md-8 col-md-offset-2 text-center">
                {{$list->links()}}
            </div>--}}
        </div>
    </div>
    </div>
@endsection
@section("portal_script")
    <script>
        Echo.channel('message')
            .listen('NewMessage', (e) => {
                console.log("aaa");
            });
    </script>

@endsection

