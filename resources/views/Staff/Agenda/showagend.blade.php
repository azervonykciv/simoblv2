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
        <li>
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
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-book"></i> <span>Project</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Staff/proj/insert') }}"><i class="fa fa-circle-o"></i>Masukkan Project</a></li>
            <li><a href="{{ url('Staff/agenda/show') }}"><i class="fa fa-circle-o"></i>Masukkan  Agenda Project</a></li>
            <li class="active"><a href="{{ url('Staff/agenda/list') }}"><i class="fa fa-circle-o"></i>Daftar Data Agenda</a></li>
            <li><a href="{{ url('Staff/proj/show')}}"><i class="fa fa-circle-o"></i> Daftar Data Project</a></li>
            <li><a href="{{ url('Staff/agenda/excelAgen') }}"><i class="fa fa-circle-o"></i>Upload Data Agenda Project</a></li>
            <li><a href="{{ url('Staff/project/excelProj') }}"><i class="fa fa-circle-o"></i>Upload Data Project</a></li>
            
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>
@stop

@section('content')


         <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agenda Project
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Agenda Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box" style="overflow-x: auto">
            <div class="box-header">
              <h3 class="box-title">Data Agenda Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Project</th>
                  <th>Nama Project</th>
                  <th>NO P1</th>
                  <th>TGL P1</th>
                  <th>No P2</th>
                  <th>TGL P2</th>
                  <th>No P3</th>
                  <th>TGL P3</th>
                  <th>No P4</th>
                  <th>TGL P4</th>
                  <th>No P5</th>
                  <th>TGL P5</th>
                  <th>No P6</th>
                  <th>TGL P6</th>
                  <th>No P7</th>
                  <th>TGL P7</th>
                  <th>No P8</th>
                  <th>TGL P8</th>
                  <th>No KL</th>
                  <th>TGL KL</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($agenda as $p)
                <tr>
                  <td>{{ $p->projectId }}</td>
                  <td>{{ $p->nama_proj }}</td>
                  <td>{{ $p->no_p1}}</td>
                  <td>{{ tgl_ind($p->tgl_p1) }}</td>
                  <td>{{ $p->no_p2}}</td>
                  <td>{{ tgl_ind($p->tgl_p2) }}</td>
                  <td>{{ $p->no_p3}}</td>
                  <td>{{ tgl_ind($p->tgl_p3) }}</td>
                  <td>{{ $p->no_p4}}</td>
                  <td>{{ tgl_ind($p->tgl_p4) }}</td>
                  <td>{{ $p->no_p5}}</td>
                  <td>{{ tgl_ind($p->tgl_p5) }}</td>
                  <td>{{ $p->no_p6}}</td>
                  <td>{{ tgl_ind($p->tgl_p6) }}</td>
                  <td>{{ $p->no_p7}}</td>
                  <td>{{ tgl_ind($p->tgl_p7) }}</td>
                  <td>{{ $p->no_p8}}</td>
                  <td>{{ tgl_ind($p->tgl_p8) }}</td>
                  <td>{{ $p->no_kl}}</td>
                  <td>{{ tgl_ind($p->tgl_kl) }}</td>

                 
                  <td>{!! link_to('Admin/agenda/'.$p->id.'/edit','Edit',['class'=>'btn waves-effect waves-light indigo']) !!}
                                {!! Form::open(array('method'=>'delete','url'=>'Admin/agenda/'.$p->id)) !!}
                                {!! Form::hidden('_delete','DELETE') !!}
                                <button class="btn waves-effect waves-light red darken" type="submit">Delete
                                </button>
                                {!! Form::close() !!}
                            </td>
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box ->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop