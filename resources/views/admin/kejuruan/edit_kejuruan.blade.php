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
                                    <li class="active"><a href="/kejuruan">Kejuruan</a></li>
                                    <li class="active">Edit Kejuruan</li>
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
                    @foreach($kejuruans_putri as $ke_putri)
                        <form method="POST" action="/kejuruan/{{$ke_putri->id_jurusan}}">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label>Nama Jurusan</label>
                                <input type="text" name="nama_jurusan" class="form-control" value="{{$ke_putri['nama_jurusan']}}"> 
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="/kejuruan" class="btn btn-secondary">Kembali</a>
                            </div>
                        @endforeach
                        </form>

                    </div>
                </div>
            </div>
        </div>
@stop