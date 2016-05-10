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
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-book"></i>Detail Project.
            <small class="pull-right">ID Project : </small>
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


{!! Form::model($agenda,array('url'=>'Staff/agenda/'.$agenda->id,'method'=>'patch')) !!}
<form role="form">
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-md-4">
                {!! Form::hidden('projectid',$project->id) !!}
                <div class="form-group">
                  <label>Nomor dokumen P1</label>
                  {!! Form::text('no_p1',null,array('class'=>'form-control')) !!}
                </div>
                 <div class="form-group">
                  <label>Angka Nomor dokumen P2-P8</label>
                  {!! Form::text('no_p',null,array('class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nomor dokumen P2-P8</label>
                  {!! Form::text('format_p',null,array('class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Angka Nomor dokumen KL</label>
                  {!! Form::text('no_kl',null,array('class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nomor dokumen KL</label>
                  {!! Form::text('format_kl',null,array('class'=>'form-control')) !!}
                </div>
                 
              </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal P1</label>
                  {!! Form::text('tgl_p1',null,array('class'=>'form-control','id'=>'ext1')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P2</label>
                  {!! Form::text('tgl_p2',null,array('class'=>'form-control','id'=>'ext2')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P3</label>
                  {!! Form::text('tgl_p3',null,array('class'=>'form-control','id'=>'ext3')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P4</label>
                  {!! Form::text('tgl_p4',null,array('class'=>'form-control','id'=>'ext4')) !!}
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal P5</label>
                  {!! Form::text('tgl_p5',null,array('class'=>'form-control','id'=>'ext5')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P6</label>
                  {!! Form::text('tgl_p6',null,array('class'=>'form-control','id'=>'ext6')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P7</label>
                  {!! Form::text('tgl_p7',null,array('class'=>'form-control','id'=>'ext7')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal P8</label>
                  {!! Form::text('tgl_p8',null,array('class'=>'form-control','id'=>'ext8')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal KL</label>
                  {!! Form::text('tgl_kl',null,array('class'=>'form-control','id'=>'ext9')) !!}
                </div>

                <div class="form-group">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>

  <!-- Modal -->
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
    </div>
              </div>
        </div>
        </form>
        {!! Form::close() !!}
      </div>
        <!-- /.col -->
      </div>
      
      <!-- /.row -->
    </section>  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
@stop

@section('script')
$(function(){
  $("#ext1").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext2").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext3").datepicker({
  format:"dd-mm-yyyy"
});
 $("#ext4").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext5").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext6").datepicker({
  format:"dd-mm-yyyy"
});
 $("#ext7").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext8").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext9").datepicker({
  format:"dd-mm-yyyy"
});
});
@stop