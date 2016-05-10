@extends('lte')
@section('skins')
<link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/skins/skin-blue.min.css') }}">

@stop
@section('headd')
<body class="hold-transition skin-blue sidebar-mini">
@stop
@section('tag')
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('bower_components/AdminLTE/dist/img/Staff.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('bower_components/AdminLTE/dist/img/Staff.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->role }}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Sign Out</button>

  <!-- Modal -->
 

                  
                </div>
              </li>
            </ul>
@stop
@section('sidebar')

 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <p></p>
          <br>
          <br>
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{ url('Staff') }}">
            <i class="fa fa-dashboard" ></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i> <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Staff/project/dlexproj') }}"><i class="fa fa-circle-o"></i>Laporan Project</a></li>
            <li><a href="{{ url('Staff/agenda/dlexagen') }}"><i class="fa fa-circle-o"></i>Laporan Agenda Project</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i>Grafik Project</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Data Induk Lain-lain</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Staff/witel/show') }}"><i class="fa fa-circle-o"></i>Data Witel</a></li>
            <li><a href="{{ url('Staff/tender/show') }}"><i class="fa fa-circle-o"></i>Data Tender</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tambah Data Lain-lain</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Staff/witel/insert') }}"><i class="fa fa-circle-o"></i>Data Witel</a></li>
            <li><a href="{{ url('Staff/tender/insert') }}"><i class="fa fa-circle-o"></i>Data Tender</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Project</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Staff/proj/insert') }}"><i class="fa fa-circle-o"></i>Create Project</a></li>
            <li><a href="{{ url('Staff/agenda/show') }}"><i class="fa fa-circle-o"></i>Create Agenda Project</a></li>
            <li><a href="{{ url('Staff/agenda/list') }}"><i class="fa fa-circle-o"></i>View Data Agenda</a></li>
            <li><a href="{{ url('Staff/proj/show')}}"><i class="fa fa-circle-o"></i> View Project</a></li>
            <li><a href="{{ url('Staff/agenda/excelAgen') }}"><i class="fa fa-circle-o"></i>Upload Data Agenda Project</a></li>
            <li><a href="{{ url('Staff/project/excelProj') }}"><i class="fa fa-circle-o"></i>Upload Data Project</a></li>
            
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>
@stop

@section('content')

            <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sisa Kontrak Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Label</th>
                  <th>ID Project</th>
                  <th>Nama Project</th>
                  <th>Sisa Kontrak (Bulan)</th>
                  <th>Sisa Kontrak (Hari)</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 @foreach($alert as $a)
                <tr>
                  
                  <td><img src="{{ asset($a->label) }}" class="img-circle" alt="User Image"></td>
                  <td>{{ $a->idproj }}</td>
                  <td>{{ $a->nama_proj }}</td>
                  <td>{{ $a->sk_bln }} Bulan</td>
                  <td>{{ $a->sk_hr }} Hari</td>
                  <td>{!! Form::open(array('method'=>'delete','url'=>'Admin/alert/'.$a->id.'/'.$a->idproj)) !!}
                                {!! Form::hidden('_delete','DELETE') !!}
                                <button class="btn btn-block btn-danger" type="submit">Tidak
                                </button>
                                {!! Form::close() !!}
                                {!! link_to('Admin/alert/insert/'.$a->id.'/'.$a->idproj,'Lanjutkan',['class'=>'btn btn-block btn-success']) !!}
                                
                  </td>

                  
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        <!-- /.col -->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="container" style="min-width: 310px; max-width: 1024px; height: 768px; margin: 0 auto"></div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- ./wrapper -->
@stop
@section('script')
$(function () {
        $('#container').highcharts(
            {!! json_encode($yourFirstChart) !!}
        );
    })

    $(document).ready(function() {
        $('.btn-primary').click(function() {
            $("#prid").val($(this).attr('data_value'));
        });
    });
@stop