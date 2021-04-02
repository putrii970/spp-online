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
                                <h1>Master</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Master</a></li>
                                    <li class="active"><a href="/kelas">Kelas</a></li>
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
                                <strong class="card-title">Tabel Kelas</strong>
                                <div class="float-right">
                                    <button type="button" style="float:right;" class="btn btn-info mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
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
                                            <form action="/kelas" method="POST">
                                                        {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class=" form-control-label">Tingkat Kelas</label><input type="text" id="nama_kelas" placeholder="" class="form-control" name="nama_kelas" required>
                                                </div>
                                                <div class="form-group">
													<label for="nama_jurusan" class="col-form-label">Nama Jurusan</label>
													<select required name="nama_jurusan" class="form-control form-control" id="nama_jurusan">
													<option value="" disabled selected>-Pilih Jurusan-</option>
													@foreach($kejuruan_putri as $kej_putri)
														<option  value="{{$kej_putri->id_jurusan}}">{{$kej_putri->nama_jurusan}}</option>
													@endforeach
													</select>
												</div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <!-- PAGINATE dan SEARCH -->
                                    <!-- <div class="row mb-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="bootstrap-data-table_length">
                                                <label>Show
                                                    <select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="50">50</option>
                                                        <option value="-1">All</option>
                                                    </select>
                                                entries</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table"></label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- TABEL -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tingkat Kelas</th>
                                                            <th>Nama Jurusan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach($kelas_putri as $kel_putri)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$kel_putri->nama_kelas}}</td>
                                                            <td>{{$kel_putri->nama_jurusan}}</td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <a href="/kelas/edit/{{$kel_putri->id_kelas_putri}}"><button type="submit" name="edit" class="btn btn-warning mb-1" style="margin-right:10px;">Edit</button></a>

                                                                    <form action="{{ action('KelasController@destroy', $kel_putri->id_kelas_putri) }}" method="POST">
                                                                            @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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

                                    <!-- SHOW DAN PAGINATE -->
                                    <!-- <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="bootstrap-data-table_next"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
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