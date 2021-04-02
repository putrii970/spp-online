@extends('../../layouts.master')

@section('content')

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
                                    <li class=""><a href="/spp">Spp</a></li>
                                    <li class="active">Edit Spp</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-body" id="content">
                    @foreach($spp_putri as $s_putri)
                        <form method="POST" action="/spp/{{$s_putri->id_spp}}">
                        @csrf
                        @method('PUT')
                            <!-- <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" name="tahun" class="form-control" value="{{$s_putri['tahun']}}"> 
                            </div> -->
                            <div class="form-group">
                                <select name="tahun" class="form-control form-control">
                                    <option>-Pilih Tahun Ajaran-</option>
                                    <?php
                                        $date_putri = date('Y', strtotime('-5 Years'));
                                        $date2_putri = date('Y', strtotime('+1 Years'));
                                        for($i_putri = $date_putri; $i_putri < $date2_putri + 4; $i_putri++){
                                        echo '<option value='.$i_putri.'>'.$i_putri.'-'.($i_putri+1).'</option>';            }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="number" name="nominal" class="form-control" value="{{$s_putri['nominal']}}"> 
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="/spp" class="btn btn-secondary">Kembali</a>
                            </div>
                        @endforeach
                        </form>

                    </div>
                </div>
            </div>
        </div>
@stop