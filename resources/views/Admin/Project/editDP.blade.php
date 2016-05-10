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

  <!-- Modal -->
 

                  
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
            <li class="active"><a href="{{ url('Admin/proj/show')}}"><i class="fa fa-circle-o"></i> Daftar Data Project</a></li>
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
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Project</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($project,array('url'=>'Admin/proj/'.$project->id,'method'=>'patch')) !!}
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>ID Project</label>
                  {!! Form::text('id',null,array('class'=>'form-control','disabled')) !!}
                </div>
                <div class="form-group">
                  <label>Jenis Tender</label>
                  {!! Form::select('jenis_tender',$tender,null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Witel</label>
                  {!! Form::select('witel',$witel,null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nomor AO</label>
                  {!! Form::text('nmr_ao',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Pelanggan</label>
                 {!! Form::text('pelanggan',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Alamat Pelanggan</label>
                    {!! Form::textarea('alamat_pelanggan',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nama Project</label>
                   {!! Form::text('nama_proj',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Lingkup Pekerjaan</label>
                  {!! Form::text('lingkup_pekerjaan',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Segmen</label>
                  {!! Form::text('segmen',null,array('class' => 'form-control')) !!}
                </div>
                 <div class="form-group">
                  <label>Mitra</label>
                  {!! Form::text('mitra',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Sub Mitra Pelaksana</label>
                  {!! Form::text('sub_mitra_pekasana',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Masa Kontrak</label>
                  {!! Form::text('masa_kontrak',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Mulai</label>
                  {!! Form::text('mulai',dates($project->mulai),array('id' => 'ext1','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Sampai</label>
                  {!! Form::text('sampai',dates($project->sampai),array('id' => 'ext2','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Delivery Layanan</label>
                   {!! Form::text('delivery_layanan',dates($project->delivery_layanan),array('id' => 'ext3','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Skema Pembayaran</label>
                   {!! Form::text('skema_pembayaran',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nilai SPH</label>
                  {!! Form::text('nilai_sph',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nilai Negos</label>
                  {!! Form::text('nilai_negos',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Total Revenue</label>
                  {!! Form::text('total_revenue',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Revenue CPE</label>
                  {!! Form::text('revenue_cpe',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Beban CPE</label>
                  {!! Form::text('beban_cpe',null,array('class' => 'form-control')) !!}
                </div>
              </div>
              <!-- /.box-body -->
              </div>
          </div>
          <!-- /.box -->
          <!-- Form Element sizes -->
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label>Margin CPE</label>
                  {!! Form::text('margin_cpe',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Skema Bisnis</label>
                  {!! Form::text('skema_bisnis',null,array('class' => 'form-control')) !!}
                </div>                
                <div class="form-group">
                  <label>Nama OSM</label>
                  {!! Form::text('nama_osm',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>NIK OSM</label>
                  {!! Form::text('nik_osm',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Jabatan OSM</label>
                  {!! Form::text('jabatan_osm',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nama MGR Bid</label>
                  {!! Form::text('nama_mgr_bid',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>NIK MGR Bid</label>
                  {!! Form::text('nik_mgr_bid',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Jabatan Bidding</label>
                  {!! Form::text('jab_bidding',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nama MGR EBIS</label>
                  {!! Form::text('nama_mgr_ebis',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Jabatan MGR EBIS</label>
                  {!! Form::text('jab_mgr_ebis',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nama Asman Bidd Witel</label>
                 {!! Form::text('nama_asman_bid_witel',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Jabatan Asman Bid Witel</label>
                  {!! Form::text('jab_asman_bid_witel',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nama AM</label>
                  {!! Form::text('nama_am',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Jabatan AM</label>
                  {!! Form::text('jab_am',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nomor KFS</label>
                    {!! Form::text('no_kfs',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Tanggal KFS</label>
                   {!! Form::text('tgl_kfs',null,array('id' => 'ext5','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Nomor KL</label>
                   {!! Form::text('no_kl',null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>Porgress TR5</label>
                    {!! Form::text('progress_tr5',null,array('class' => 'form-control')) !!}
                </div>
             
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
     </div>
          </form>
        
        {!! Form::close() !!}
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  
<!-- ./wrapper -->
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
$("#ext4").datepicker({
  format:"dd-mm-yyyy"
});
$("#ext4").datepicker({
  format:"dd-mm-yyyy"
});
});
@stop