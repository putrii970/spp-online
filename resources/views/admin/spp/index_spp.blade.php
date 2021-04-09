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
                                    <li class="active"><a href="/spp">Spp</a></li>
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
                                <strong class="card-title">Tabel Spp</strong>
                                <div class="float-right">
                                    <button type="button" style="float:right;" class="btn btn-sm btn-info mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
                                </div>
                                <a href="/spp/exportPdf"><button type="button" style="float:right;" class="btn btn-sm btn-success mb-1 mr-1">Export Pdf</button></a>
                            </div> 
                            
                            <!-- MODAL TAMBAH -->
                            <div class="card-body">
                                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Tambah Spp</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="/spp" method="POST">
                                                        {{csrf_field()}}
                                                <div class="form-group">
                                                    <select name="tahun" class="form-control form-control">
                                                        <option>-Pilih Tahun Ajaran-</option>
                                                        <?php
                                                            $date_putri = date('Y', strtotime('-5 Years'));
                                                            $date2_putri = date('Y', strtotime('+1 Years'));
                                                            for($i_putri = $date_putri; $i_putri < $date2_putri + 4; $i_putri++){
                                                                echo '<option value='.$i_putri.'>'.$i_putri.'-'.($i_putri+1).'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nominal" class="form-control-label">Nominal</label>
                                                    <input type="number" id="nominal" placeholder="" class="form-control money" name="nominal" required>
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
                                                            <th>Tahun Ajaran</th>
                                                            <th>Nominal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach($spp_putri as $sp_putri)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <?php $spp_int_putri = (int)$sp_putri->tahun + 1; ?>
                                                            <td>{{$sp_putri->tahun}} - {{$spp_int_putri}}</td>
                                                            <td>@currency($sp_putri->nominal)</td>
                                                            <td>
                                                                <div class="d-flex mt-2">
                                                                    <a href="/spp/edit/{{$sp_putri->id_spp}}"><button type="submit" name="edit" class="btn btn-sm btn-warning mb-1" style="margin-right:10px;">Edit</button></a>

                                                                    <form action="{{ action('SppController@destroy', $sp_putri->id_spp) }}" method="POST">
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
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
</div>
@stop

@section('page-script')
    <script>
        $(document).ready(function(){
            $('#nominal').mask('0.000.000.000.000.000', {reverse:true});
            // $('.money').mask("#,##0.000", {reverse: true});
        })

        
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script> -->
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
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