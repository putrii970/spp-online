@extends('../../layouts.master')
@section('page-style')
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@stop


@section('content')
@if(session('sukses'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Sukses</span>
                                        {{session('sukses')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
        </div>
@endif

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Gagal</span>
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
</div>
@endforeach
@endif
<!-- Header-->

    <!-- BREADCRUMB -->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Laporan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Laporan</a></li>
                                    <li class="active"><a href="/pendapatan">Pendapatan</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="content">
        <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel Pendapatan</strong>
                                <div class="float-right">
                                    <button type="button" style="float:right;" class="btn btn-sm btn-info mb-1" data-toggle="modal" data-target="#mediumModal">Filter</button>
                                    <a href="/pendapatan/exportPdf"><button type="button" style="float:right;" class="btn btn-sm btn-success mb-1 mr-1">Export Pdf</button></a>
                                </div>
                            </div> 
                            <div class="card-body">
                                <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    
                                    <!-- TABEL -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Nominal</th>
                                                            <th>Bulan Dibayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Tahun Dibayar</th>
                                                            <th>Jumlah Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach($pendapatan_putri as $pen_putri)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$pen_putri->putri_siswa->nisn}}</td>
                                                            <td>{{$pen_putri->putri_siswa->nama}}</td>
                                                            <td>{{$pen_putri->spp_putri->nominal}}</td>
                                                            <td>{{$pen_putri->bulan_dibayar}}</td>
                                                            <td>{{$pen_putri->tgl_bayar}}</td>
                                                            <td>{{$pen_putri->tahun_dibayar}}</td>
                                                            <td>{{$pen_putri->jumlah_bayar}}</td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php 
                                                            $pendapatan_putri+= $pen_putri->jumlah_bayar;
                                                        ?>
                                                    @endforeach
                                                    </tbody>
                                                    <td colspan="6" style="text-align: right;" ><b>Total Pendapatan :</b></td>
                                                    <td style="text-align: center;"><b>$pendapatan_putri</b></td>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Filter</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form id="form_validation" action="{{route('pendapatan.filter')}}" method="get" enctype="multipart/form-data">
                                            
                                                <div class="form-group form-float {{$errors->has('kelas') ? ' has-danger' : ''}}" >
                                                    <select name="kelas" class="form-control show-tick">
                                                        <option value="">-- Pilih Kelas --</option>
                                                        @foreach ($kelas_putri as $k_putri)
                                                        <option value="{{ $k_putri->id_kelas }}">{{ $k_putri->nama_kelas}} {{ $k_putri->kejuruan_putri->nama_jurusan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group form-float {{$errors->has('tahun') ? ' has-danger' : ''}}" >
                                                    <select name="tahun" class="form-control ">
                                                    <option value="">-- Pilih Tahun--</option>
                                                    @foreach ($spp_putri as $id_putri => $s_putri)
                                                    <?php $tahun2 = $s_putri->tahun + 1 ?>
                                                    <option value="{{ $s_putri->tahun }}">{{ $s_putri->tahun}} - {{$tahun2}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>                                  
                                                        
                                                <div class="form-group form-float input-group">
                                                    <div class="input-group masked-input">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                        </div>
                                                        <input name = "startTime" type="date" class="form-control date" >
                                                    </div>
                                                </div>

                                                <div class="form-group form-float input-group">
                                                    <div class="input-group masked-input">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                        </div>
                                                        <input name = "endTime" type="date" class="form-control date" >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-float">
                                                    <!-- <p class="text-warning"> * All inputs here are optional</p> -->
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-raised btn-primary waves-effect" type="submit">Cari</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
    </div>
                            

@stop
@section('page-script')
<script src="{{asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
@stop