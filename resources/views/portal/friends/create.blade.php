@extends('portal.layout.home')
@section('content_portal')
    <!-- Page Content -->
    <div class="zl-article-list-big-div container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>友情链接</h3>
                {{--<form>--}}
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 form-control-label">邮箱：</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="邮箱">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 form-control-label">链接名：</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="链接名">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUrl" class="col-sm-2 form-control-label">链接地址：</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputUrl" placeholder="链接地址">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUrl" class="col-sm-2 form-control-label">简介：</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="inputSummary"placeholder="简介"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-secondary" id="friendSubmit">申请</button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>

        </div>
    </div>
    <!-- /.container -->
@endsection
@section('portal_script')
    <script>
        $("#friendSubmit").click(function(){
            var data = {
                email:$("#inputEmail").val(),
                name:$("#inputName").val(),
                url:$("#inputUrl").val(),
                summary:$("#inputSummary").val()
            }
            $.ajax({
                url:"{{url('/friends')}}",
                type:"POST",
                data:data,
                success:function (data) {
                    console.log(data)
                },
                error:function () {
                    
                }
            })
        })
    </script>
@endsection
