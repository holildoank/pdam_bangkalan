<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> PDAM BANGKALAN ||</title>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}"/>
  <meta content="" name="description" />
  <meta content="" name="author" />
  @yield('csstop')
  <!-- pace loading -->


  {{-- <link rel="stylesheet" href="/plag/pace/pace-loading-bar.css"> --}}
  <link href="{{ asset('/plag/pace/pace-loading-bar.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Bootstrap 3.3.6 -->
  {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> --}}
  <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
  {{-- <link rel="stylesheet" href="/plag/font-awesome-4.4.0/css/font-awesome.min.css"> --}}
  <link href="{{ asset('/plag/font-awesome-4.4.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

  {{-- <link rel="stylesheet" href="/plag/ionicons-2.0.1/css/ionicons.min.css""> --}}
  <link href="{{ asset('/plag/ionicons-2.0.1/css/ionicons.min.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="/dist/css/AdminLTE.min.css"> --}}
  <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {{-- <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css"> --}}
  <link href="{{ asset('/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css"/>
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="/plag/iCheck/flat/blue.css"> --}}
  <link href="{{ asset('/plag/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Morris chart -->
  {{-- <link rel="stylesheet" href="/plag/morris/morris.css"> --}}
  <link href="{{ asset('/plag/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
  <!-- jvectormap -->
  {{-- <link rel="stylesheet" href="/plag/jvectormap/jquery-jvectormap-1.2.2.css"> --}}
  <link href="{{ asset('/plag/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Date Picker -->
  {{-- <link rel="stylesheet" href="/plag/datepicker/datepicker3.css"> --}}
  <link href="{{ asset('/plag/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="/plag/daterangepicker/daterangepicker-bs3.css"> --}}
  <link href="{{ asset('/plag/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>

  <!-- bootstrap wysihtml5 - text editor -->
  {{-- <link rel="stylesheet" href="/plag/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> --}}
  <link href="{{ asset('/plag/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css"/>
  <!-- sweetalert -->
  {{-- <link href="/plag/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/> --}}
  <link href="{{ asset('/plag/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
  <!-- select2 -->
  {{-- <link rel="stylesheet" href="/plag/select2/select2.min.css"> --}}
  <link href="{{ asset('/plag/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  {{--  file input --}}
  {{-- <script src="/plag/bootstrap-fileinput/bootstrap-fileinput.css"></script> --}}
  <!-- funcyboxa -->
  <link href="{{ asset('/assets/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>

  <!-- jQuery 2.2.0 -->
  {{-- <script src="/plag/jQuery/jQuery-2.2.0.min.js"></script> --}}
  <script src="{{ asset ('/plag/jQuery/jQuery-2.2.0.min.js') }}" type="text/javascript"></script>
  <!-- jQuery UI 1.11.4 -->
  {{-- <script src="/plag/pace/pace.min.js"></script> --}}
  <script src="{{ asset ('/plag/pace/pace.min.js') }}" type="text/javascript"></script>
   {{-- <script src="/plag/jQuery/jquery-ui.min.js"></script> --}}
  <script src="{{ asset ('/plag/jQuery/jquery-ui.min.js') }}" type="text/javascript"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  {{-- <script src="/bootstrap/js/bootstrap.min.js"></script> --}}
  <script src="{{ asset ('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
  {{-- <script src="/plag/jQuery/raphael-min.js"></script> --}}
  <script src="{{ asset ('/plag/jQuery/raphael-min.js') }}" type="text/javascript"></script>
  {{-- <script src="/plag/morris/morris.min.js"></script> --}}
  <script src="{{ asset ('/plag/morris/morris.min.js') }}" type="text/javascript"></script>
  <!-- Sparkline -->
  {{-- <script src="/plag/sparkline/jquery.sparkline.min.js"></script> --}}
   <script src="{{ asset ('/plag/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <!-- jvectormap -->
  {{-- <script src="/plag/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> --}}
   <script src="{{ asset ('/plag/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
  {{-- <script src="/plag/jvectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
   <script src="{{ asset ('plag/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  {{-- <script src="/plag/knob/jquery.knob.js"></script> --}}
   <script src="{{ asset ('/plag/knob/jquery.knob.js') }}" type="text/javascript"></script>
  <!-- daterangepicker -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
  {{-- <script src="/plag/jQuery/moment.min.js"></script> --}}
  <script src="{{ asset ('/plag/jQuery/moment.min.js') }}" type="text/javascript"></script>
  {{-- <script src="/plag/daterangepicker/daterangepicker.js"></script> --}}
  <script src="{{ asset ('/plag/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
  <!-- datepicker -->
  {{-- <script src="/plag/datepicker/bootstrap-datepicker.js"></script> --}}
  <script src="{{ asset ('/plag/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  {{-- <script src="/plag/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> --}}
   <script src="{{ asset ('/plag/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
  <!-- Slimscroll -->
  {{-- <script src="/plag/slimScroll/jquery.slimscroll.min.js"></script> --}}
   <script src="{{ asset ('/plag/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
  <!-- FastClick -->
  {{-- <script src="/plag/fastclick/fastclick.js"></script> --}}
   <script src="{{ asset ('/plag/fastclick/fastclick.js') }}" type="text/javascript"></script>
  <!-- AdminLTE App -->
  {{-- <script src="/dist/js/app.min.js"></script> --}}
   <script src="{{ asset ('/dist/js/app.min.js') }}" type="text/javascript"></script>
  <!-- sweetalert -->
  {{-- <script src="/plag/sweetalert/sweetalert.min.js"></script> --}}
   <script src="{{ asset ('/plag/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
  {{-- select2 --}}
  {{-- <script src="/plag/select2/select2.full.min.js"></script> --}}
   <script src="{{ asset ('/plag/select2/select2.full.min.js') }}" type="text/javascript"></script>
  {{-- file input --}}
  {{-- <script src="/plag/bootstrap-fileinput/bootstrap-fileinput.js"></script> --}}
   <script src="{{ asset ('/plag/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
   <!-- funcybox -->
   <script src="{{ asset ('/assets/plugins/jquery.fancybox.js') }}" type="text/javascript"></script>

@yield('myjs')
@yield('meta')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>IM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PDAM BANGKALAN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="greeting"><small>Welcome</small></div>
        <div class="pull-left info"><small>{{ Me::data()->nm_depan }}</small>

          <div class="status">{{ Format::hari(date('Y-m-d')) }},</div>
        </div>
      </div>
      <br><br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <!-- menu---- -->
      {!! Menu::mainMenu() !!}
      </ul>
     <!--  --------menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <small>{{$title}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    @include('layouts.notifikasi')
      @yield('content')
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer>
   @yield('footer')
  </footer>

  <!-- /.control-sidebar -->
</div>


<script type="text/javascript">
        var _base_url = '{{ url() }}';
    </script>
        @yield('js')
</body>
</html>
