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
                                    <li class="active"><a href="/petugas">Petugas</a></li>
                                    <li class="active">Edit Petugas</li>
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
                @if(session('salah'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Gagal</span>
                                        {{session('salah')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
        </div>
@endif
                    <div class="card-body" id="content">
                    @foreach($petugas_putri as $pet_putri)
                        <form method="POST" action="/petugas/{{$pet_putri->id_petugas}}">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{$pet_putri['username']}}"> 
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="{{$pet_putri['password']}}"> 
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="k_password" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" value="{{$pet_putri['nama_petugas']}}"> 
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level" id="level">
                                    <option value="" disabled selected>-- Pilih Level --</option>
                                    <option value="petugas" {{ ($pet_putri->level === 'admin'? 'selected' : '')}}>Admin</option>
                                    <option value="admin" {{($pet_putri->level === 'petugas')? 'selected' : ''}}>Petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="/petugas" class="btn btn-secondary">Kembali</a>
                            </div>
                        @endforeach
                        </form>

                    </div>
                </div>
            </div>
        </div>
@stop