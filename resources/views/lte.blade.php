<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM-OBL - Telkom Indonesia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/datepicker.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  @yield('skins')
<style>
.datepicker{z-index:1151;}
</style>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
@yield('headd')
<div class="wrapper">
@if(Session::has('success'))
              <div class="modal fade" id="myModalhello" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Selamat Datang {{ Auth::user()->name }} </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
    </div>
@endif

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>OBL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM</b><b>-</b><b>OBL</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            @yield('tag')
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  @yield('sidebar')

  <!-- Content Wrapper. Contains page content -->
  
  @yield('content')
   
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     <b>SIM-OBL</b>
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="#">Camel Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
   <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
           <a href="{{ url('logout') }}" class="btn btn-primary">Sign Out</a>
        </div>
      </div>
    </div>
    </div>
</div>
<!-- ./wrapper -->
  

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/dist/js/bootstrap-datepicker.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('high/js/highcharts.js') }}"></script>
<script src="{{ asset('high/modules/exporting.js') }"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });



</script> 
<script type="text/javascript">
    $(window).load(function(){
        $('#myModalhello').modal('show');
    });
</script>
<script>
@yield('script')
</script>
</body>
</html>
