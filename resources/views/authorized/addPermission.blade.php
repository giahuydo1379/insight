@extends('layouts.master') @section('header_css')
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="/public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="/public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="/public/assets/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="/public/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css" rel="stylesheet">



@endsection
@section('page-head')
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Quản lý nhóm</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('user.get-show-all') }}">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li class="active">Thêm quyền</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>
@endsection @section('content')
    <div class="panel panel-bordered panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                Thêm quyền
            </h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'authorized/add-permission', 'method' => 'post', 'class' => 'panel-body form-horizontal form-padding']) !!}
            {{--Begin Input Staff Name--}}

            <div class="col-lg-6">
                <div class="panel">


                    <!--No Label Form-->
                    <!--===================================================-->
                    <form class="form-horizontal">
                        <div class="panel-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 control-label">
                                    <dt>name</dt>
                                </label>

                                <div class="col-md-4 mar-btm">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>

                                <label for="display_name" class="col-sm-2 control-label">
                                    <dt>display_name</dt>
                                </label>

                                <div class="col-md-4 mar-btm">
                                    <input type="text" class="form-control" placeholder="display_name" name="display_name">
                                </div>



                                {{--Begin Input Staff Last Name--}}

                                    <label for="description" class="col-sm-2 control-label">
                                        <dt>description</dt>
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="selectpicker" name="description" id="description">
                                            <option value="0" disabled selected>
                                                - ========Chọn nhóm=======</option>
                                            <option value="1">- Thành viên</option>
                                            <option value="2">- Dịch vụ Fdrive</option>
                                            <option value="3">- Khách hàng</option>
                                            <option value="4">- Phân quyền</option>
                                        </select>
                                        <small class="help-block">{{ $errors->first('role_id') }}</small>
                                    </div>

                                {{--End Input Staff Last Name--}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-7 col-sm-offset-5">
                                <a class="btn btn-primary" href="{{ route('authorized.get-show-role') }}"> <i class="glyphicon glyphicon-share
                    "></i> Quay lại</a>
                                <button class="btn btn-mint" type="submit">Lưu</button>
                                <button class="btn btn-warning" type="reset">Thiết lập lại</button>
                            </div>
                        </div>

                    </form>
                    <!--===================================================-->
                    <!--End No Label Form-->

                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>
    </div>

    {{--End Input Staff Name--}} {{--End Input Staff Status--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-10 col-sm-offset-2">--}}
    {{--<button class="btn btn-mint" type="submit">Lưu</button>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection @section('footer_js')
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="/public/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="/public/assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <script>
        $(document).ready(function () {
            $('.iframe-btn').fancybox({
                'width': 900,
                'height': 600,
                'type': 'iframe',
                'autoScale': false
            });
        });

        function responsive_filemanager_callback(field_id) {
            var url = jQuery('#' + field_id).val();
            $("#im_avatar").attr('src', url);
        }
    </script>
@endsection