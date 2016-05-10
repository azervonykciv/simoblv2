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
            <li><a href="{{ url('Admin/proj/insert') }}"><i class="fa fa-circle-o"></i>Masukkan Project</a></li>
            <li><a href="{{ url('Admin/agenda/show') }}"><i class="fa fa-circle-o"></i>Masukkan Agenda Project</a></li>
            <li><a href="{{ url('Admin/agenda/list') }}"><i class="fa fa-circle-o"></i>Daftar Data Agenda</a></li>
            <li class="active"><a href="{{ url('Admin/proj/show')}}"><i class="fa fa-circle-o"></i>Daftar Project</a></li>
            <li><a href="{{ url('Admin/agenda/excelAgen') }}"><i class="fa fa-circle-o"></i>Upload Data Agenda Project</a></li>
            <li><a href="{{ url('Admin/project/excelProj') }}"><i class="fa fa-circle-o"></i>Upload Data Project</a></li>
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

@if(Session::has('error'))
            <div class="modal fade" id="myModalhello" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Peringatan</h4>
        </div>
        <div class="modal-body">
          <p>{!!Session::get('error')!!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
    </div>
  @endif


         <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box" style="overflow-x: auto">
            <div class="box-header">
              <h3 class="box-title">Data Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Project</th>
                  <th>Witel</th>
                  <th>Nomor AO</th>
                  <th>Pelanggan</th>
                  <th>Alamat Pelanggan</th>
                  <th>Nama Project</th>
                  <th>Lingkup Pekerjaan</th>
                  <th>Segmen</th>
                  <th>Jenis Tender</th>
                  <th>Mitra</th>
                  <th>Sub Mitra Pelaksana</th>
                  <th>Masa Kontrak</th>
                  <th>Mulai</th>
                  <th>Sampai</th>
                  <th>Delivery Layanan</th>
                  <th>Skema Pembayaran</th>
                  <th>Nilai SPH</th>
                  <th>Nilai Negos</th>
                  <th>Total Revenue</th>
                  <th>Revenue CPE</th>
                  <th>Beban CPE</th>
                  <th>Margin CPE</th>
                  <th>Skema Bisnis</th>
                  <th>Nama OSM</th>
                  <th>NIK OSM</th>
                  <th>Jab OSM</th>
                  <th>Nama MGR Bidd</th>
                  <th>NIK MGR Bidd</th>
                  <th>Jab Bidd</th>
                  <th>Nama MGR EBIS</th>
                  <th>Jab MGR EBIS</th>
                  <th>Nama Asman Bid Witel</th>
                  <th>Jab Asman Bid Witel</th>
                  <th>Nama AM</th>
                  <th>Jab AM</th>
                  <th>No KFS</th>
                  <th>TGL KFS</th>
                  <th>NO KL</th>
                  <th>Progress TR5</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($project as $p)
                <tr>
                  <td>{{ $p->id }}</td>
                  <td>{{ $p->witel }}</td>
                  <td>{{ $p->nmr_ao}}</td>
                  <td>{{ $p->pelanggan}}</td>
                  <td>{{ $p->alamat_pelanggan}}</td>
                  <td>{{ $p->nama_proj}}</td>
                  <td>{{ $p->lingkup_pekerjaan}}</td>
                  <td>{{ $p->segmen}}</td>
                  <td>{{ $p->jenis_tender}}</td>
                  <td>{{ $p->mitra}}</td>
                  <td>{{ $p->sub_mitra_pelaksana}}</td>
                  <td>{{ $p->masa_kontrak}}</td>
                  <td>{{ tgl_ind($p->mulai) }}</td>
                  <td>{{ tgl_ind($p->sampai) }}</td>
                  <td>{{ tgl_ind($p->delivery_layanan) }}</td>
                  <td>{{ $p->skema_pembayaran}}</td>
                  <td>{{ $p->nilai_sph}}</td>
                  <td>{{ $p->nilai_negos}}</td>
                  <td>Rp.{{ number_format($p->total_revenue,0,",",".") }}</td>
                  <td>{{ $p->revenue_cpe}}</td>
                  <td>{{ $p->beban_cpe}}</td>
                  <td>{{ $p->margin_cpe}}</td>
                  <td>{{ $p->skema_bisnis}}</td>
                  <td>{{ $p->nama_osm}}</td>
                  <td>{{ $p->nik_osm}}</td>
                  <td>{{ $p->jab_osm}}</td>
                  <td>{{ $p->nama_mgr_bid}}</td>
                  <td>{{ $p->nik_mgr_bidding}}</td>
                  <td>{{ $p->jab_bidding}}</td>
                  <td>{{ $p->nama_mgr_ebis}}</td>
                  <td>{{ $p->jab_mgr_ebis}}</td>
                  <td>{{ $p->nama_asman_bidd_witel}}</td>
                  <td>{{ $p->jab_asman_bid_wit}}</td>
                  <td>{{ $p->nama_am}}</td>
                  <td>{{ $p->jab_am}}</td>
                  <td>{{ $p->no_kfs}}</td>
                  <td>{{ tgl_ind($p->tgl_kfs) }}</td>
                  <td>{{ $p->no_kl}}</td>
                  <td>{{ $p->progress_tr5}}</td>
                  <td>{!! link_to('Admin/proj/'.$p->id.'/edit','Edit',['class'=>'btn waves-effect waves-light indigo']) !!}
                      {!! Form::open(array('method'=>'delete','url'=>'Admin/proj/'.$p->id)) !!}
                      {!! Form::hidden('_delete','DELETE') !!}
                                <button class="btn waves-effect waves-light red darken" type="submit">Delete
                                </button>
                                {!! link_to('Admin/project/uploadocs/'.$p->id,'Upload Dokumen',['class'=>'btn waves-effect waves-light indigo']) !!}
                            </td>
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop