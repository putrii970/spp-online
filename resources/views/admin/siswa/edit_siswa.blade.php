@extends('../../layouts.master')

@section('content')

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
                                    <li class="active">Edit Data Siswa</li>
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
                        <form method="POST" action="/siswa/{{$siswa_putri->nisn}}">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" value="{{$siswa_putri['nisn']}}"> 
                            </div>
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" name="nis" class="form-control" value="{{$siswa_putri['nis']}}"> 
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$siswa_putri->nama}}"> 
                            </div>
                            <div class="form-group">
								<label class="col-form-label">Kelas</label>
								<select required name="putri_kelas_id_kelas" class="form-control form-control" >
                                    <option  value="">-Pilih Kelas-</option>
                                        @foreach($kelas_putri as $kel_putri)
                                    <option {{$siswa_putri->putri_kelas_id_kelas == $kel_putri->id_kelas ? 'selected' : ''}} value="{{$kel_putri->id_kelas}}">{{$kel_putri->nama_kelas}} {{$kel_putri->kejuruan_putri->nama_jurusan}}</option>
                                        @endforeach
								</select>
							</div>
                            <div class="form-group">
                                <label class="form-control-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" value=" "class="form-control">{{$siswa_putri->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_telp" class="form-control" value="{{$siswa_putri['no_telp']}}"> 
                            </div>
                            <div class="form-group">
								<label class="col-form-label">Tahun</label>
								<select required name="spp_id_spp" class="form-control form-control" >
                                    <option  value="">-Pilih Tahun-</option>
                                        @foreach($spp_putri as $sp_putri => $s_putri)
                                        <?php $spp_int_putri = (int)$s_putri->tahun + 1; ?>
                                    <option {{$siswa_putri->spp_id_spp == $sp_putri ? 'selected' : ''}} value="{{$sp_putri}}">{{$s_putri}}</option>
                                        @endforeach
								</select>
							</div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="/siswa" class="btn btn-secondary">Kembali</a>
                            </div>
                 
                        </form>

                    </div>
                </div>
            </div>
        </div>
@stop