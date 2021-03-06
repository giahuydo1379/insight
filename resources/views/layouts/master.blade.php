<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>FTI | INSIGHT</title>


  <!--STYLESHEET-->
  <!--=================================================-->

  <!--Open Sans Font [ OPTIONAL ]-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

  <link rel="shortcut icon" href="/public/favicon.ico">

  <!--Bootstrap Stylesheet [ REQUIRED ]-->
  <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">


  <!--Nifty Stylesheet [ REQUIRED ]-->
  <link href="/public/assets/css/nifty.min.css" rel="stylesheet">


  <!--Nifty Premium Icon [ DEMONSTRATION ]-->
  <link href="/public/assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">

  <!--Font Awesome [ OPTIONAL ]-->
  <link href="/public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!--=================================================-->


  <!--Pace - Page Load Progress Par [OPTIONAL]-->
  <link href="/public/assets/plugins/pace/pace.min.css" rel="stylesheet">
  <script src="/public/assets/plugins/pace/pace.min.js"></script>

  <!--Custom scheme [ OPTIONAL ]-->
  <link href="/public/assets/css/themes/type-c/theme-navy.min.css" rel="stylesheet">

@yield('header_css')


<!--=================================================

  REQUIRED
  You must include this in your project.


  RECOMMENDED
  This category must be included but you may modify which plugins or components which should be included in your project.


  OPTIONAL
  Optional plugins. You may choose whether to include it in your project or not.


  DEMONSTRATION
  This is to be removed, used for demonstration purposes only. This category must not be included in your project.


  SAMPLE
  Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


  Detailed information and more samples can be found in the document.

  =================================================-->

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

  <!--NAVBAR-->
  <!--===================================================-->
  @include('layouts._header');
  <!--===================================================-->
  <!--END NAVBAR-->

  <div class="boxed">

    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">

    @yield('page-head')


    <!--Fixedbar-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    {{--@include('layouts._fixed-bar')--}}
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End Fixedbar-->

      <!--Page content-->
      <!--===================================================-->
      <div id="page-content">

        @yield('content')

      </div>
      <!--===================================================-->
      <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->


    <!--ASIDE-->
    <!--===================================================-->
  @include('layouts._aside')
  <!--===================================================-->
    <!--END ASIDE-->


    <!--MAIN NAVIGATION-->
    <!--===================================================-->
    <nav id="mainnav-container">
      <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->


        <!--Menu-->
        <!--================================-->
      @include('layouts._menu')
      <!--================================-->
        <!--End menu-->

      </div>
    </nav>
    <!--===================================================-->
    <!--END MAIN NAVIGATION-->

  </div>

  <!-- FOOTER -->
  <!--===================================================-->
@include('layouts._footer')
<!--===================================================-->
  <!-- END FOOTER -->


  <!-- SCROLL PAGE BUTTON -->
  <!--===================================================-->
  <button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
  </button>
  <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="/public/assets/js/jquery.min.js"></script>

<!--BootstrapJS [ RECOMMENDED ]-->
<script src="/public/assets/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="/public/assets/js/nifty.min.js"></script>


@yield('footer_js')

<script>
   @if(session('msg-success') || session('msg-error'))
    $(document).ready(function () {
        var msg = "{{ session('msg-success') ? session('msg-success') : session('msg-error') }}";
        var type = "{{ session('msg-success') ? 'success' : 'danger' }}";
        notifyMsg(msg, type);

    });
  @endif

  function notifyMsg(msg, type = 'success') {
    $.niftyNoty({
      type: type,
      title: 'Thông báo',
      message: msg,
      container: 'floating',
      timer: 5000
    })
  }
</script>


</body>
</html>
