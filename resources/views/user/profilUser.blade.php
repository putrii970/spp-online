@extends('user.layoutsUser.master_user')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Kartu Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <div class="container">
                                        <!-- <div class="card kartu"  style="margin-top:20px;"> -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                </div>

                                                <div class="col-md-8 kertas-biodata">
                                                    <div class="biodata">
                                                    <table width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td valign="top"><br>
                                                            <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;" id="data_siswa">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Nama</td>
                                                                        <td>:</td>
                                                                        <td style="color: rgb(118, 157, 29); font-weight:bold" id="nama">{{Session::get('nama')}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>NISN</td>
                                                                        <td>:</td>
                                                                        <td id="nisn">{{Session::get('nisn')}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>NIS</td>
                                                                        <td>:</td>
                                                                        <td id="nis">{{Session::get('nis')}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kelas</td>
                                                                        <td>:</td>
                                                                        <td id="kelas">{{Session::get('nama')}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table><br>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>

                                            </div>
                                        <!-- </div> -->
                                    </div>
                                    <!-- <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div> -->
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
@stop