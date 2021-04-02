@extends('../../layouts.master')
@section('page-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop
<style>
      body {
        background-color: #e8e8e8;
      }
      .kartu {
        width: 800px;
        margin: 0 auto;
        margin-top: 70px;
        box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,.03);
        transition: all .3s;
      }
      tbody {
        font-size: 20px;
        font-weight: 300;
      }
      .biodata {
        margin-top: 30px;
      }
      /* Bulan */
      *{font-family: 'Roboto', sans-serif;}

        @keyframes click-wave {
        0% {
            height: 40px;
            width: 40px;
            opacity: 0.35;
            position: relative;
        }
        100% {
            height: 200px;
            width: 200px;
            margin-left: -80px;
            margin-top: -80px;
            opacity: 0;
        }
        }

        .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 40px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
        }
        .option-input:hover {
        background: #9faab7;
        }
        .option-input:checked {
        background: #40e0d0;
        }
        .option-input:checked::before {
        height: 40px;
        width: 40px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 26.66667px;
        text-align: center;
        line-height: 40px;
        }
        .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
        }
        .option-input.radio {
        border-radius: 50%;
        }
        .option-input.radio::after {
        border-radius: 50%;
        }

</style>
@section('content')
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
                                    <li class="active"><a href="/pembayaran">Pembayaran</a></li>
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
                            <form action="">
                                <div class="card-body">
                                    <select class="cari form-control form-control" style="width:100%;" name="cari" id="cari_siswa">
                                    </select>
                                </div>
                            </form>

                                <div class="container">
                                    <div class="card kartu"  style="margin-top:20px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                            </div>

                                            <div class="col-md-8 kertas-biodata">
                                                <div class="biodata">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                        <td valign="top">
                                                        <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;" id="data_siswa">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td style="color: rgb(118, 157, 29); font-weight:bold" id="nama"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NISN</td>
                                                                    <td>:</td>
                                                                    <td id="nisn"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIS</td>
                                                                    <td>:</td>
                                                                    <td id="nis"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kelas</td>
                                                                    <td>:</td>
                                                                    <td id="kelas"></td>
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
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card" id="card_body">
                                            <div class="card-header">
                                                <center><h4>Tahun Ajaran</h4></center>
                                            </div>
                                            <div class="card-body">
                                                <div class="default-tab">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="kelas_x" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                                            </a>
                                                            <a class="nav-item nav-link" id="kelas_xi" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                                            </a>
                                                            <a class="nav-item nav-link" id="kelas_xii" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                            </a>
                                                        </div>
                                                    </nav><br>
                                                    
                                                            <div class="tab-content pl-3 pt-2" id="nav-tabCont ent">
                                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                                    <form method="POST" action="{{ action('PembayaranController@store') }}">
                                                                        @csrf 
                                                                        <div class="row">   
                                                                            <div class="col-lg-8">
                                                                                <div class="exp">
                                                                                    <div class="checkbox">
                                                                                        <div>
                                                                                            <input type="hidden" id="tahun" name="tahun"></input>
                                                                                            <input type="hidden" id="jumlah_bayar" name="jumlah_bayar"></input>
                                                                                            <input type="hidden" id="id_petugas" name="id_petugas" value="{{ Auth::guard('admin')->user()->id_petugas }}"></input>   
                                                                                            <input type="hidden" id="id_siswa" name="id_siswa"></input> 
                                                                                            <input type="hidden" id="id_spp" name="id_spp"></input>
                                                                                        </div>
                                                                                        <div>
                                                                                            @foreach($bulan_putri as $b_putri)
                                                                                            <label>
                                                                                                <input type="checkbox" name="bulan[]" id="id_checkbox{{$b_putri->id_bulan}}" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                                                {{$b_putri->nama_bulan}}
                                                                                            </label>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!-- Credit Card -->
                                                                                        <div id="pay-invoice">
                                                                                            <div class="card-body">
                                                                                                <div class="card-title">
                                                                                                    <h3 class="text-center">Pembayaran SPP</h3>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <!-- <form action="#" method="post" novalidate="novalidate"> -->
                                                                                                    <div class="form-group">
                                                                                                        <label for="cc-payment" class="control-label mb-1">Nominal Spp</label>
                                                                                                        <input name="nominal" type="text" id="nominal_spp" class="form-control" value="" readonly="">
                                                                                                    </div>
                                                                                                    <div class="form-group has-success">
                                                                                                        <label for="cc-name" class="control-label mb-1">Total</label>
                                                                                                        <input name="jumlah_bayar" type="number" id="jumlah_bayar2" class="form-control cc-name valid" data-val="true" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name" readonly="">
                                                                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                                                                    </div>
                                                                                        
                                                                                                    <div>
                                                                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                                                                            <span id="payment-button-amount">Submit</span>
                                                                                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                
                                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                                    <div class="checkbox">
                                                                    <form>
                                                                    <div>
                                                                        @foreach($bulan_putri as $b_putri)
                                                                        <label>
                                                                            <input type="checkbox" name="bulan[]" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                            {{$b_putri->nama_bulan}}
                                                                        </label>
                                                                        @endforeach
                                                                    </div>
                                                                    
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                                    <div class="checkbox">
                                                                    <form>
                                                                    <div>
                                                                        @foreach($bulan_putri as $b_putri)
                                                                        <label>
                                                                            <input type="checkbox" name="bulan[]" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                            {{$b_putri->nama_bulan}}
                                                                        </label>
                                                                        @endforeach
                                                                    </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        
                                                        
                                                    

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

    <!-- live-search -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

        $("#card_body").hide();
        $("#data_siswa").hide();
        var nominal_putri;
        // console.log(nominal_putri);
        function showTahun(tahun){
            let x_putri = parseInt(tahun);
            let xi_putri = parseInt(tahun) + 1;
            let xii_putri = parseInt(tahun) + 2;
            // console.log(x_putri);
            // console.log(xi_putri);
            // console.log(xii_putri);

            $("#kelas_x").text(x_putri +'-'+ (x_putri+1));
            $("#kelas_xi").text(xi_putri +'-'+ (xi_putri+1));
            $("#kelas_xii").text(xii_putri +'-'+ (xii_putri+1));
        }

        
    
        $('.cari').select2({
            placeholder: 'Cari...',
            ajax: {
            url: '{{route('pembayaran.filter')}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.nisn + " - " + item.nama,
                        id: item.nisn
                    }
                })
                };
            },
            cache: true
            }
        });

        $("#cari_siswa").change(function () {
            // alert('ok');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
            });
            $.ajax({
                type: "POST",
                url: '{{route('pembayaran.cari')}}',
                data: { 
                    data: $("#cari_siswa").val() 
                },
                dataType: 'json',
                success: function(response) {
                // use console.log for debugging, and access the property of the deserialised object
                    console.log(response); 
                    $("#nama").text(response[0].nama);
                    $("#nisn").text(response[0].nisn);
                    $("#nis").text(response[0].nis);
                    $("#kelas").text(response[0].putri_kelas.nama_kelas + " " + response[0].putri_kelas.kejuruan_putri.nama_jurusan);

                    showTahun(response[0].putri_spp.tahun);    

                    $("#card_body").show();
                    $("#data_siswa").show();

                    document.getElementById("id_siswa").value = response[0].nisn;
                    document.getElementById("id_spp").value = response[0].putri_spp.id_spp;
                    nominal_putri = response[0].putri_spp.nominal;
                    document.getElementById("tahun").value = response[0].putri_spp.tahun;
                    
                    let input_nominal = document.getElementById("nominal_spp");
                    console.log(input_nominal + '' + response[0].putri_spp.nominal);

                    $("#nominal_spp").val(response[0].putri_spp.nominal);
                }
            });
        });

        $(document).ready(function() {
            //set initial state.
            // $('#textbox1').val(this.checked);
            // console.log($('#id_checkbox[]').val());
            
            // var index_putri = 0;
            var total_putri = 0;

            for (let i=0;i < 13; i++){

                $('#id_checkbox' + i).change(function() {
                        alert($(this).val());
                        total_putri += nominal_putri;
                        console.log($(this).val());
                        console.log(total_putri);
                        $("#jumlah_bayar2").val(total_putri);      
                });
            }
            

        });
    </script>
@stop