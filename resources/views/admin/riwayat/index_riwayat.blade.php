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
                                <h1>Transaksi</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Transaksi</a></li>
                                    <li class="active"><a href="/riwayat">Riwayat</a></li>
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
                                <strong class="card-title">Riwayat Pembayaran</strong>
                                <div class="float-right">
                                    <a href="/riwayat/exportPdf"><button type="button" style="float:right;" class="btn btn-sm btn-success mb-1 mr-1">Export Pdf</button></a>
                                    FILTER DATA
                                </div>
                            </div> 
                            
                            <!-- MODAL TAMBAH -->
                            <div class="card-body">
                                <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <!-- TABEL -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Petugas</th>
                                                            <th>NISN</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Bulan Dibayar</th>
                                                            <th>Tahun Dibayar</th>
                                                            <th>Tahun Ajaran</th>
                                                            <th>Nominal</th>
                                                            <th>Jumlah Bayar</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach($riwayat_putri as $ri_putri)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$ri_putri->petugas_putri->nama_petugas}}</td>
                                                            <td>{{$ri_putri->putri_siswa->nisn}}</td>
                                                            <td>{{$ri_putri->tgl_bayar}}</td>
                                                            <td>{{$ri_putri->bulan_dibayar}}</td>
                                                            <td>{{$ri_putri->tahun_dibayar}}</td>
                                                            <td>{{$ri_putri->spp_putri->tahun}}</td>
                                                            <td>{{$ri_putri->spp_putri->nominal}}</td>
                                                            <td>{{$ri_putri->jumlah_bayar}}</td>
                                                            <!-- <td>
                                                                <div class="d-flex mt-2">
                                                                    <a href="/kelas/edit/{{$kel_putri->id_kelas_putri}}"><button type="submit" name="edit" class="btn btn-sm btn-warning mb-1" style="margin-right:10px;">Edit</button></a>

                                                                    <form action="{{ action('KelasController@destroy', $kel_putri->id_kelas_putri) }}" method="POST">
                                                                            @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="btn btn-sm  btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                    </form>
                                                                </div> -->
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
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