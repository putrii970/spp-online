@extends('layout.master')
@section('title', 'Income')
@section('parentPageTitle', 'Report')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
@if(count($errors) > 0)
@foreach($errors->all() as $error) 
<div class="alert alert-danger" role="alert">
    <div class="container">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            <strong>Oh snap!</strong> {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
    </div>
</div>
@endforeach
@endif

@if(session('success'))
    <div class="alert alert-success" role="alert">
        <div class="container">
            <div class="alert-icon">
                <i class="zmdi zmdi-thumb-up"></i>
            </div>
            <strong>Well done!</strong>  {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>
    </div>
@endif

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Income</strong> Report </h2>
            </div>
            <div class="body">
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Filter
                </button> 
                <div class="table-responsive">
                <?php $income = 0 ?>
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>Name</th>
                                <th>Per Month</th>
                                <th>Paid (month)</th>
                                <th>Payment Date</th>
                                <th>School Year</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($income_nioni as $value_nioni)
                            <tr>
                                <td>{{ $value_nioni->students->nisn}}</td>
                                <td>{{ $value_nioni->students->nama}}</td>
                                <td>@currency($value_nioni->tuition->nominal)</td>
                                <td>{{ $value_nioni->bulan_dibayar}}</td>
                                <td>{{ $value_nioni->tgl_bayar}}</td>
                                <td>{{ $value_nioni->tahun_dibayar}}</td>
                                <td>@currency($value_nioni->jumlah_bayar)</td>

                            </tr>
                            <?php 
                                $income+= $value_nioni->jumlah_bayar;
                            ?>
                            @endforeach
                        </tbody>
                            <td colspan="6" style="text-align: right;" ><b>Total Income :</b></td>
                            <td style="text-align: center;"><b>@currency($income)</b></td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                                <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="body">
                                        <form id="form_validation" action="{{route('report.income.filter')}}" method="get" enctype="multipart/form-data">
                                            
                                            <div class="form-group form-float {{$errors->has('kelas') ? ' has-danger' : ''}}" >
                                                <select name="kelas" class="form-control show-tick">
                                                    <option value="">-- Please select class --</option>
                                                    @foreach ($class_nioni as $v_nioni)
                                                    <option value="{{ $v_nioni->id_kelas }}">{{ $v_nioni->kelas}} {{ $v_nioni->vocational->jurusan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group form-float {{$errors->has('tahun') ? ' has-danger' : ''}}" >
                                                <select name="tahun" class="form-control ">
                                                <option value="">-- Please select year--</option>
                                                @foreach ($tuition_nioni as $id_nioni => $v_nioni)
                                                <?php $tahun2 = $v_nioni->tahun + 1 ?>
                                                <option value="{{ $v_nioni->tahun }}">{{ $v_nioni->tahun}} - {{$tahun2}}</option>
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
                                                <p class="text-warning"> * All inputs here are optional</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-raised btn-primary waves-effect" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
        </div>


@stop
@section('page-script')
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
@stop