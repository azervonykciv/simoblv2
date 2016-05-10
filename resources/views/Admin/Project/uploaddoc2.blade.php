@extends('lte')
@section('skins')
<link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/skins/skin-red.min.css') }}">

@stop
@section('headd')
<body class="hold-transition skin-red sidebar-mini">
@stop
@section('tag')
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('bower_components/AdminLTE/dist/img/Admin.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('bower_components/AdminLTE/dist/img/Admin.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->role }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Sign Out</button>
                </div>
              </li>
            </ul>
@stop
@section('splash')
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
       
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ url('Admin') }}">
            <i class="fa fa-dashboard" ></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i> <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Admin/project/dlexproj') }}"><i class="fa fa-circle-o"></i>Laporan Project</a></li>
            <li><a href="{{ url('Admin/agenda/dlexagen') }}"><i class="fa fa-circle-o"></i>Laporan Agenda Project</a></li>
            <li><a href="{{ url('Admin/proj/listdoc') }}"><i class="fa fa-circle-o"></i>Laporan Dokumen Project</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i>Grafik Project</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Data Induk Lain-lain</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Admin/witel/show') }}"><i class="fa fa-circle-o"></i>Data Witel</a></li>
            <li><a href="{{ url('Admin/tender/show') }}"><i class="fa fa-circle-o"></i>Data Tender</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tambah Data Lain-lain</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Admin/witel/insert') }}"><i class="fa fa-circle-o"></i>Data Witel</a></li>
            <li><a href="{{ url('Admin/tender/insert') }}"><i class="fa fa-circle-o"></i>Data Tender</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-book"></i> <span>Project</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Admin/proj/insert') }}"><i class="fa fa-circle-o"></i>Create Project</a></li>
            <li><a href="{{ url('Admin/agenda/show') }}"><i class="fa fa-circle-o"></i>Create Agenda Project</a></li>
            <li><a href="{{ url('Admin/agenda/list') }}"><i class="fa fa-circle-o"></i>View Data Agenda</a></li>
            <li><a href="{{ url('Admin/proj/show')}}"><i class="fa fa-circle-o"></i> View Data Project</a></li>
            <li><a href="{{ url('Admin/agenda/excelAgen') }}"><i class="fa fa-circle-o"></i>Upload Data Agenda Project</a></li>
            <li class="active"><a href="{{ url('Admin/project/excelProj') }}"><i class="fa fa-circle-o"></i>Upload Data Project</a></li>
            
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-child"></i> <span>Administrator</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('Admin/user/insert') }}"><i class="fa fa-circle-o"></i>Membuat User</a></li>
            <li><a href="{{ url('Admin/user/show')}}"><i class="fa fa-circle-o"></i> Lihat User</a></li>
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
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>


    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-book"></i>Detail Project.
            <small class="pull-right">ID Project : {{ $project->id }} </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Witel:</strong> {{ $project->witel }}<br>
            <strong>Jenis Tender:</strong> {{ $project->jenis_tender }}<br>
            <strong>Nama Project:</strong> {{ $project->nama_proj }}<br>
            <strong>Nama Customer:</strong> {{ $project->pelanggan }}<br>
            <strong>Lingkup Pekerjaan:</strong> {{ $project->lingkup_pekerjaan }}<br>
            <strong>Segmen:</strong> {{ $project->segmen }}<br>
            <strong>Mitra:</strong> {{ $project->mitra }}<br>
            <strong>Sub Mitra Pelaksana:</strong> {{ $project->sub_mitra_pelaksana }}<br>
            <strong>Masa Kontrak:</strong> {{ $project->masa_kontrak }}<br>
            <strong>Mulai:</strong>{{ tgl_ind($project->mulai) }}<br>
            <strong>Sampai:</strong> {{ tgl_ind($project->sampai) }}<br>
            <strong>Delivery Layanan:</strong> {{ tgl_ind($project->delivery_layanan) }}<br>
            <strong>Skema Pembayaran:</strong> {{ $project->skema_pembayaran }}<br>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong>Nilai SPH:</strong> {{ $project->nilai_sph }}<br>
            <strong>Nilai Negos:</strong> {{ $project->nilai_negos }}<br>
            <strong>Total Revenue:</strong> {{ $project->total_revenue }}<br>
            <strong>Revenue CPE:</strong> {{ $project->revenue_cpe }}<br>
            <strong>Beban CPE:</strong> {{ $project->beban_cpe }}<br>
            <strong>Margin CPE:</strong> {{ $project->margin_cpe }}<br>
            <strong>Prosentase:</strong> {{ $project->prosentase }}<br>
            <strong>Skema Bisnis:</strong> {{ $project->skema_bisnis }}<br>
            <strong>Nama OSM:</strong> {{ $project->nama_osm }}<br>
            <strong>NIK OSM:</strong> {{ $project->nik_osm }}<br>
            <strong>Jabatan OSM:</strong> {{ $project->jab_osm }}<br>
            <strong>Nama MGR Bidding:</strong> {{ $project->nama_mgr_bidding }}<br>
            <strong>NIK MGR Bidding:</strong> {{ $project->nik_mgr_bidding }}<br>
        </div>
        <div class="col-sm-4 invoice-col">
          <strong>Jabatan Bidding:</strong> {{ $project->jab_bidding }}<br>
            <strong>Nama MGR EBIS:</strong> {{ $project->nama_mgr_ebis }}<br>
            <strong>Nama Asman Bid Witel:</strong> {{ $project->nama_asman_bidd_witel }}<br>
            <strong>Jab Asman Bid Witel:</strong> {{ $project->jab_asman_bid_witel }}<br>
            <strong>Nama AM:</strong> {{ $project->nama_am }}<br>
            <strong>Jab AM:</strong> {{ $project->jab_am }}<br>
            <strong>No KFS:</strong> {{ $project->no_kfs }}<br>
            <strong>Tanggal KFS:</strong> {{ tgl_ind($project->tgl_kfs) }}<br>
            <strong>Progress TR5:</strong> {{ $project->progress_tr5 }}<br>
        </div>
      </div>
      <!-- /.row -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
       <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>

         @if(Session::has('error'))
            <div class="alert alert-danger">
              <ul>
                    <li>{!!Session::get('error')!!}</li>
              </ul>
            </div>
          @endif
              @if(Session::has('success'))
              <div class="alert alert-success">
              <ul>
                    <li>{!!Session::get('success')!!}</li>
              </ul>
            </div>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('route'=>'post-doc','files'=>'true')) !!}
            <form role="form">
              <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Dokumen</th>
                  <th></th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                {!! Form::hidden('projectid',$project->id) !!}
                  <td><strong>P1</strong></td>
                  <td><div class="form-group">
                  {!! Form::file('p1') !!}
                </div></td>
                <td><strong></strong></td>
                </tr>
                 <tr>
                  <td>P2</td>
                  <td><div class="form-group">
                  {!! Form::file('p2') !!}
                </div></td>
                </tr>
                 <tr>
                  <td>P3</td>
                  <td><div class="form-group">
                  {!! Form::file('p3') !!}
                </div></td>
                </tr>
                 <tr>
                  <td>P4</td>
                  <td><div class="form-group">
                  {!! Form::file('p4') !!}
                </div></td>
                </tr>
                 <tr>
                  <td>P5</td>
                  <td><div class="form-group">
                  {!! Form::file('p5') !!}
                </div></td>
                </tr>
                 <tr>
                  <td>P6</td>
                  <td><div class="form-group">
                  {!! Form::file('p6') !!}
                </div></td>
                </tr>
                 <tr>
                  <td>P7</td>
                  <td><div class="form-group">
                  {!! Form::file('p7') !!}
                </div></td>
                </tr>
                <tr>
                  <td>P8</td>
                  <td><div class="form-group">
                  {!! Form::file('p8') !!}
                </div></td>
                </tr>
                </tbody>
              </table>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
              </div>

              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
    
                <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apakah data sudah benar?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">kirim</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
@stop