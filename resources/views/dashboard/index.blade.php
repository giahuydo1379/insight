@extends('layouts.master')

@section('header_css')
@endsection
@section('page-head')
  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Dashboard</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="#"><i class="demo-pli-home"></i></a></li>
      <li class="active">Dashboard 2</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

  </div>
@endsection
@section('content')
  <!--Activated Users Chart-->
  <!--===================================================-->
  <div class="panel">

    <!--Chart information-->
    <div class="panel-body">
      <div class="row mar-top">
        <div class="col-md-5">
          <h3 class="text-main text-normal text-2x mar-no">Activated Users</h3>
          <h5 class="text-uppercase text-muted text-normal">Report for last 7-days ago</h5>
          <hr class="new-section-xs">
          <div class="row mar-top">
            <div class="col-sm-5">
              <div class="text-lg"><p class="text-5x text-thin text-main mar-no">520</p></div>
              <p class="text-sm">Since 2016 190 peoples already registered</p>
            </div>
            <div class="col-sm-7">
              <div class="list-group bg-trans mar-no">
                <a class="list-group-item" href="#"><i class="demo-pli-information icon-lg icon-fw"></i> User Details</a>
                <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                <a class="list-group-item" href="#"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
              </div>
            </div>
          </div>
          <button class="btn btn-pink mar-ver">View Details</button>
          <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
        </div>
        <div class="col-md-7">
          <div id="demo-bar-chart" style="height:250px"></div>
          <hr class="new-section-xs bord-no">
          <ul class="list-inline text-center">
            <li><span class="label label-info">354</span> Students</li>
            <li><span class="label label-warning">74</span> Parents</li>
            <li><span class="label label-default">25</span> Teachers</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--===================================================-->
  <!--End Activated Users chart-->


@endsection

@section('footer_js')

  <!--Flot Chart [ OPTIONAL ]-->
  <script src="/public/assets/plugins/flot-charts/jquery.flot.min.js"></script>
  <script src="/public/assets/plugins/flot-charts/jquery.flot.categories.min.js"></script>
  <script src="/public/assets/plugins/flot-charts/jquery.flot.orderBars.min.js"></script>
  <script src="/public/assets/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
  <script src="/public/assets/plugins/flot-charts/jquery.flot.resize.min.js"></script>


  <!--Specify page [ SAMPLE ]-->
  <script src="/public/assets/js/demo/dashboard-2.js"></script>

@endsection
