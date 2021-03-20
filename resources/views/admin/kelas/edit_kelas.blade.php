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
                                    <li class="active"><a href="/kelas">Kelas</a></li>
                                    <li class="active">Edit Kelas</li>
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
                    
                        <form method="POST" action="/kelas/{{$kelas_putri->id_kelas}}">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label>Tingkat Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" value="{{$kelas_putri['nama_kelas']}}"> 
                            </div>
                            <div class="form-group">
								<label for="jurusan_id" class="col-form-label">Nama Jurusan</label>
								<select required name="jurusan_id" class="form-control form-control" id="jurusan_id">
                                    <option  value="">-Pilih Jurusan-</option>
                                        @foreach($kejuruan_putri as $ke_putri => $k_putri)
                                    <option {{$kelas_putri->jurusan_id == $ke_putri ? 'selected' : ''}} value="{{$ke_putri}}">{{$k_putri}}</option>
                                        @endforeach
								</select>
							</div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="/kejuruan" class="btn btn-secondary">Kembali</a>
                            </div>
                 
                        </form>

                    </div>
                </div>
            </div>
        </div>
@stop