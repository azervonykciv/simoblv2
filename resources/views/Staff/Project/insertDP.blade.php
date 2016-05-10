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
            <li class="active"><a href="{{ url('Staff/proj/insert') }}"><i class="fa fa-circle-o"></i>Masukkan Project</a></li>
            <li><a href="{{ url('Staff/agenda/show') }}"><i class="fa fa-circle-o"></i>Masukkan  Agenda Project</a></li>
            <li><a href="{{ url('Staff/agenda/list') }}"><i class="fa fa-circle-o"></i>Daftar Data Agenda</a></li>
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
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Project</h3>

            </div>
             <p>
    Proin nec rhoncus, quis, elementum amet parturient augue sagittis
    dictumst in dolor scelerisque pid, sociis enim porttitor et, porta
    porttitor. Tincidunt egestas ultricies, scelerisque.
    </p>
    <p>
    Proin nec rhoncus, quis, elementum amet parturient augue sagittis
    dictumst in dolor scelerisque pid, sociis enim porttitor et, porta
    porttitor. Tincidunt egestas ultricies, scelerisque.
    </p>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('route'=>'post-project')) !!}
            <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label>ID Project</label>
                  <input type="text" name="id" class="form-control" id="ex1" placeholder="Masukkan Nomor AO">
                </div>
                <div class="form-group">
                  <label>Jenis Tender</label>
                  {!! Form::select('jenis_tender',$tender) !!}
                </div>
                <div class="form-group">
                  <label>Witel</label>
                  {!! Form::select('witel',$witel) !!}
                </div>
                <div class="form-group">
                  <label>Nomor AO</label>
                  <input type="text" name="nmr_ao" class="form-control" id="ex1" placeholder="Masukkan Nomor AO">
                </div>
                <div class="form-group">
                  <label>Pelanggan</label>
                  <input type="text" name="pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan">
                </div>
                <div class="form-group">
                  <label>Alamat Pelanggan</label>
                   <textarea class="form-control" name="alamat_pelanggan" rows="3" placeholder="Masukkan Alamat Pelanggan"></textarea>
                </div>
                <div class="form-group">
                  <label>Nama Project</label>
                  <input type="text" name="nama_proj" class="form-control" placeholder="Masukkan nama project">
                </div>
                <div class="form-group">
                  <label>Lingkup Pekerjaan</label>
                  <input type="text" name="lingkup_pekerjaan" class="form-control" placeholder="Masukkan lingkup pekerjaan">
                </div>
                <div class="form-group">
                  <label>Segmen</label>
                  <input type="text" name="segmen" class="form-control" placeholder="Masukkan Segmen">
                </div>
                 <div class="form-group">
                  <label>Mitra</label>
                  <input type="text" name="mitra" class="form-control" placeholder="Masukkan Nama User">
                </div>
                <div class="form-group">
                  <label>Sub Mitra Pelaksana</label>
                  <input type="text" name="sub_mitra_pelaksana" class="form-control" placeholder="Masukkan Nama User">
                </div>
                <div class="form-group">
                  <label>Masa Kontrak</label>
                  <input type="text" name="masa_kontrak" class="form-control" placeholder="Masukkan Nama User">
                </div>
                <div class="form-group">
                  <label>Mulai</label>
                   <input type="text" id="ext1" class="form-control" name="mulai" placeholder="Masukkan Skema Pembayaran">
                </div>
                <div class="form-group">
                  <label>Sampai</label>
                  <input type="text" id="ext2" class="form-control" name="sampai" placeholder="Masukkan Skema Pembayaran">
                </div>
                <div class="form-group">
                  <label>Delivery Layanan</label>
                   <input type="text" id="ext3" class="form-control" name="delivery_layanan" rows="3" placeholder="Masukkan Skema Pembayaran">
                </div>
                <div class="form-group">
                  <label>Skema Pembayaran</label>
                   <input type="text" class="form-control" name="skema_pembayaran" rows="3" placeholder="Masukkan Skema Pembayaran"></textarea>
                </div>
                <div class="form-group">
                  <label>Nilai SPH</label>
                  <input type="text" name="nilai_sph" class="form-control" placeholder="Masukkan Nilai SPH">
                </div>
                <div class="form-group">
                  <label>Nilai Negos</label>
                  <input type="text" name="nilai_negos" class="form-control" placeholder="Masukkan Nilai Negos">
                </div>
                <div class="form-group">
                  <label>Total Revenue</label>
                  <input type="text" name="total_revenue" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Revenue CPE</label>
                  <input type="text" name="revenue_cpe" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Beban CPE</label>
                  <input type="text" name="beban_cpe" class="form-control" placeholder="Masukkan Nama User">
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- Form Element sizes -->
        </div>
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
                  <input type="text" name="margin_cpe" class="form-control" placeholder="Masukkan Nama User">
                </div>
                <div class="form-group">
                  <label>Skema Bisnis</label>
                  <input type="text" name="skema_bisnis"   placeholder="Masukkan Nama User">
                </div>                
                <div class="form-group">
                  <label>Nama OSM</label>
                  <input type="text" name="nama_osm" class="form-control" placeholder="Masukkan Nilai Negos">
                </div>
                <div class="form-group">
                  <label>NIK OSM</label>
                  <input type="text" name="nik_osm" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Jabatan OSM</label>
                  <input type="text" name="jab_osm" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Nama MGR Bid</label>
                  <input type="text" name="nama_mgr_bid" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>NIK MGR Bid</label>
                  <input type="text" name="nik_mgr_bid" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Jabatan Bidding</label>
                  <input type="text" name="jab_bidding" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Nama MGR EBIS</label>
                  <input type="text" name="nama_mgr_ebis" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Jabatan MGR EBIS</label>
                  <input type="text" name="jab_mgr_ebis" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Nama Asman Bidd Witel</label>
                  <input type="text" name="nama_asman_bid_wittel" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Jabatan Asman Bid Witel</label>
                  <input type="text" name="jab_asman_bid_witel" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Nama AM</label>
                  <input type="text" name="nama_am" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Jabatan AM</label>
                  <input type="text" name="jab_am" class="form-control" placeholder="Masukkan Segmen">
                </div>
                <div class="form-group">
                  <label>Nomor KFS</label>
                   <input type="text" class="form-control" name="no_kfs" rows="3" placeholder="Masukkan Skema Pembayaran"></textarea>
                </div>
                <div class="form-group">
                  <label>Tanggal KFS</label>
                   <input type="text" class="form-control" id="ext4" name="tgl_kfs" rows="3" placeholder="Masukkan Skema Pembayaran"></textarea>
                </div>
                <div class="form-group">
                  <label>Porgress TR5</label>
                   <input type="text" class="form-control" name="progress_tr5" rows="3" placeholder="Masukkan Skema Pembayaran"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="form-group">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Kirim</button>

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
          </form>
          </div>
        </div>
        {!! Form::close() !!}
        <!--/.col (right) -->
      </div>
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
});
@stop