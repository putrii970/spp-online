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
                                    <li class="active"><a href="/siswa">Data Siswa</a></li>
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
                                <strong class="card-title">Tabel Siswa</strong>
                                <div class="float-right">
                                    <button type="button" style="float:right;" class="btn btn-sm btn-info mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
                                    <a href="/siswa/exportPdf"><button type="button" style="float:right;" class="btn btn-sm btn-success mb-1 mr-1">Export Pdf</button></a>
                                </div>
                            </div> 
                            
                            <!-- MODAL TAMBAH -->
                            <div class="card-body">
                                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Tambah Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="/siswa" method="POST">
                                                        {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class=" form-control-label">NISN</label><input type="text" id="nisn" placeholder="" class="form-control" name="nisn" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">NIS</label><input type="text" id="nis" placeholder="" class="form-control" name="nis" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">Nama</label><input type="text" id="nama" placeholder="" class="form-control" name="nama" required>
                                                </div>
                                                <div class="form-group">
													<label class="col-form-label">Kelas</label>
													<select required name="kelas" class="form-control form-control" id="kelas">
													<option value="" disabled selected>-Pilih Kelas-</option>
													@foreach($kelas_putri as $kel_putri)
														<option value="{{$kel_putri->id_kelas}}">{{$kel_putri->nama_kelas}} {{$kel_putri->kejuruan_putri->nama_jurusan}}</option>
													@endforeach
													</select>
												</div>
                                                <div class="form-group">
                                                    <label class="form-control-label">Alamat</label>
                                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">No Telp</label><input type="number" id="no_telp" placeholder="" class="form-control" name="no_telp" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Tahun</label>
													<select required name="spp" class="form-control form-control" id="spp_id">
													    <option value="" disabled selected>-Pilih Tahun-</option>
													    @foreach($spp_putri as $s_putri)
                                                        <?php $spp_int_putri = (int)$s_putri->tahun + 1; ?>
														<option  value="{{$s_putri->id_spp}}">{{$s_putri->tahun}} - {{$spp_int_putri}}</option>
													    @endforeach
													</select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <!-- TABEL -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NISN</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Alamat</th>
                                                            <th>No Telepon</th>
                                                            <th>Spp</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach($siswa_putri as $sis_putri)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$sis_putri->nisn}}</td>
                                                            <td>{{$sis_putri->nis}}</td>
                                                            <td>{{$sis_putri->nama}}</td>
                                                            <td>{{$sis_putri->putri_kelas->nama_kelas}} {{$sis_putri->putri_kelas->kejuruan_putri->nama_jurusan}}</td>
                                                            <td>{{$sis_putri->alamat}}</td>
                                                            <td>{{$sis_putri->no_telp}}</td>
                                                            <td>{{$sis_putri->putri_spp->tahun}}</td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <a href="/siswa/edit/{{$sis_putri->nisn}}"><button type="submit" name="edit" class="btn btn-sm btn-warning mb-1" style="margin-right:10px;">Edit</button></a>

                                                                    <form action="{{ action('SiswaController@destroy', $sis_putri->nisn) }}" method="POST">
                                                                            @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END -->
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