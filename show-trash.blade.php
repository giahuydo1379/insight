@extends('layouts.master')
@section('header_css')

  <!--DataTables [ OPTIONAL ]-->
  <link href="/public/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="/public/assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
  <!--Font Awesome [ OPTIONAL ]-->
  <link href="/public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!--Bootstrap Table [ OPTIONAL ]-->
  <link href="/public/assets/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


  <!--Font Awesome [ OPTIONAL ]-->
  <link href="/public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <!--X-editable [ OPTIONAL ]-->
  <link href="/public/assets/plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">



  <!--=================================================

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
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li class="active">Danh sách nhóm đã xóa</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
  <a class="btn btn-primary" href="{{ route('authorized.get-show-role') }}"> <i class="glyphicon glyphicon-share
                    "></i> Quay lại</a>
  </div>
@endsection
@section('content')
  <div class="panel">
    <div class="panel-body">
      <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr align="center">
        <tr>
          <th>STT</th>
          <th>Name </th>
          <th>Display name</th>
          <th>Description</th>
          <th width="100px">{{__('Thực hiện')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($role as $key => $role)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>

            <td align="center">
              <a href="#"  onclick="putBackItem(<?php echo $role->id  ?>)"
              class="btn btn-warning btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Khôi phục">
              <i class="fa fa-repeat icon-lg"></i></a>
              <a href="#"  onclick="removeItem(<?php echo $role->id  ?>)" style="margin-left: 5px"
              class="btn btn-danger btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Xóa">
              <i class="fa fa-trash icon-lg"></i></a>

            </td>
          </tr>

        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection


@section('footer_js')
  <!--jQuery [ REQUIRED ]-->
  <script src="/public/assets/js/jquery.min.js"></script>
    <!--DataTables [ OPTIONAL ]-->
    <script src="/public/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="/public/assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="/public/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


    <!--DataTables Sample [ SAMPLE ]-->
    <script src="/public/assets/js/demo/tables-datatables.js"></script>




  <!--BootstrapJS [ RECOMMENDED ]-->
  <script src="/public/assets/js/bootstrap.min.js"></script>


  <!--NiftyJS [ RECOMMENDED ]-->
  <script src="/public/assets/js/nifty.min.js"></script>
  <script>
      var $table = $('#demo-dt-basic');
      function removeItem(id) {

          if (confirm('Xác nhận khôi phục nhóm ?')) {
              var data = {
                  '_token': '{{ csrf_token() }}',
                  'id': id
              };

              $.get('/authorized/remove-trash/' + id, data, function (data) {
                  var type = (data.code != 0) ? 'danger' : 'success';
                  notifyMsg(data.msg, type);
                  $table.bootstrapTable('refresh');
          });
          }
      }

      function putBackItem(id) {

          if (confirm('Xác nhận khôi phục nhóm ?')) {
              var data = {
                  '_token': '{{ csrf_token() }}',
                  'id': id
              };

              $.get('/authorized/put-back/' + id, data, function (data) {
                  var type = (data.code != 0) ? 'danger' : 'success';
                  notifyMsg(data.msg, type);

                  $table.Table('refresh');

              });
          }
      }
  </script>

@endsection


