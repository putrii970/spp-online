@extends('user.layoutsUser.master_user')
<style>
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
<?php
  
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
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
                                                                                        <!-- <div>
                                                                                            <input type="hidden" id="tahun" name="tahun"></input>
                                                                                            <input type="hidden" id="jumlah_bayar" name="jumlah_bayar"></input>
                                                                                            <input type="hidden" id="id_petugas" name="id_petugas" value=""></input>   
                                                                                            <input type="hidden" id="nisninput" name="nisn"></input> 
                                                                                            <input type="hidden" id="id_spp" name="id_spp"></input>
                                                                                        </div> -->
                                                                                        <div class="grid-container">
                                                                                        <div class="grid-item">
                                                                                            @foreach($bulan_putri as $b_putri)
                                                                                            <label>
                                                                                                <input type="checkbox" name="bulan_bayar[]" id="id_checkbox{{$b_putri->id_bulan}}" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                                                {{$b_putri->nama_bulan}}
                                                                                            </label>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                
                                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
                                                                    <form method="POST" action="{{ action('PembayaranController@store') }}">
                                                                    @csrf 
                                                                        <div class="row">   
                                                                            <div class="col-lg-8">
                                                                                <div class="exp">
                                                                                    <div  class="checkbox">
                                                                                        <!-- <div>
                                                                                            <input type="hidden" id="tahun_xi" name="tahun"></input>
                                                                                            <input type="hidden" id="jumlah_bayar_xi" name="jumlah_bayar"></input>
                                                                                            <input type="hidden" id="id_petugas_xi" name="id_petugas" value=""></input>   
                                                                                            <input type="hidden" id="nisninput_xi" name="nisn"></input> 
                                                                                            <input type="hidden" id="id_spp_xi" name="id_spp"></input>
                                                                                        </div> -->
                                                                                        @foreach($bulan_putri as $b_putri)
                                                                                        <label>
                                                                                            <input type="checkbox" id="history_xi{{$b_putri->id_bulan}}" name="bulan[]" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                                            {{$b_putri->nama_bulan}}
                                                                                        </label>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                                <form method="POST" action="{{ action('PembayaranController@store') }}">
                                                                    @csrf 
                                                                        <div class="row">   
                                                                            <div class="col-lg-8">
                                                                                <div class="exp">
                                                                                    <div  class="checkbox">
                                                                                        <!-- <div>
                                                                                            <input type="hidden" id="tahun_xii" name="tahun"></input>
                                                                                            <input type="hidden" id="jumlah_bayar_xii" name="jumlah_bayar"></input>
                                                                                            <input type="hidden" id="id_petugas_xii" name="id_petugas" value=""></input>   
                                                                                            <input type="hidden" id="nisninput_xii" name="nisn"></input> 
                                                                                            <input type="hidden" id="id_spp_xii" name="id_spp"></input>
                                                                                        </div> -->
                                                                                        @foreach($bulan_putri as $b_putri)
                                                                                        <label>
                                                                                            <input type="checkbox" id="history_xii{{$b_putri->id_bulan}}" name="bulan[]" class="option-input checkbox" value="{{$b_putri->id_bulan}}"/>
                                                                                            {{$b_putri->nama_bulan}}
                                                                                        </label>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>

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
@stop
@section('page-script')

    <!-- live-search -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
        $.ajax({
            url: '/kartuSppUser',
            type: 'GET',
            dataType: 'json',
        }).done(function(res){
            let data = res.data
            let siswa= res.data_siswa
            console.log(data);
            $('input[name^="bulan_bayar"]').each( function() {
                let bulan = this.value
                let component = this
                $.each(data, function(index, pembayaran){ 
                    $.each(pembayaran.putri_detail_pembayaran, function(key, detail){
                        if(detail.bulan_id == bulan){
                            $(component).prop('checked', true);
                        }
                    })
                })
            });
        })

    var x_putri, xi_putri, xii_putri;
    var tahunBayarTerakhir, bulanSudahBayar, jumlahBulanBayar = 0;

    function showTahun(tahun, tahunBayarTerakhir, bulanSudahBayar){
            x_putri = parseInt(tahun);
            xi_putri = parseInt(tahun) + 1;
            xii_putri = parseInt(tahun) + 2;
            console.log(bulanSudahBayar + 'bulan nih' + tahunBayarTerakhir);

            $("#kelas_x").text(x_putri +'-'+ (x_putri+1));
            $("#kelas_xi").text(xi_putri +'-'+ (xi_putri+1));
            $("#kelas_xii").text(xii_putri +'-'+ (xii_putri+1));

            if(tahunBayarTerakhir == x_putri && bulanSudahBayar == 0) {
                $("#tab_x").hide();
                $("#tab_xi").show();
                $("#tab_xii").hide();
                console.log(bulanSudahBayar + 'true1');

            }
            if(tahunBayarTerakhir == x_putri && bulanSudahBayar < 12) {
                $("#tab_x").show();
                $("#tab_xi").hide();
                $("#tab_xii").hide();
                for (let i=0;i <= bulanSudahBayar; i++) {
                    $('#id_checkbox' + i).prop('checked', true).attr("disabled", true);      
                }
                console.log(bulanSudahBayar+ 'true2');
            }
            if(tahunBayarTerakhir == xi_putri && bulanSudahBayar < 12) {
                $("#tab_x").hide();
                $("#tab_xi").show();
                $("#tab_xii").hide();
                for (let i=0;i <= 12; i++){
                        $('#id_checkbox' + i).prop('checked', true).attr("disabled", true);      
                   
                }

                for (let i=0;i <= bulanSudahBayar; i++) {
                    $('#history_xi' + i).prop('checked', true).attr("disabled", true);      
                }
                console.log(bulanSudahBayar+ 'true3');
            }

            if(tahunBayarTerakhir == xi_putri && bulanSudahBayar == 12) {
                $("#tab_x").hide();
                $("#tab_xi").hide();
                $("#tab_xii").show();
                console.log(bulanSudahBayar+ 'true4');
            }

            if(tahunBayarTerakhir == xii_putri && bulanSudahBayar < 12) {
                $("#tab_x").hide();
                $("#tab_xi").hide();
                $("#tab_xii").show();
                for (let i=0;i <= 12; i++){
                        $('#id_checkbox' + i).prop('checked', true).attr("disabled", true);      
                   
                }

                for (let i=0;i <= 12; i++) {
                    $('#history_xi' + i).prop('checked', true).attr("disabled", true);      
                }
                for (let i=0;i <= bulanSudahBayar; i++) {
                    $('#history_xii' + i).prop('checked', true).attr("disabled", true);      
                }
                console.log(bulanSudahBayar+ 'true5');

            }

            if(tahunBayarTerakhir == xii_putri && bulanSudahBayar == 12) {
                $("#tab_x").hide();
                $("#tab_xi").hide();
                $("#tab_xii").hide();
                for (let i=0;i <= 12; i++){
                        $('#id_checkbox' + i).prop('checked', true).attr("disabled", true);      
                   
                }

                for (let i=0;i <= 12; i++) {
                    $('#history_xi' + i).prop('checked', true).attr("disabled", true);      
                }
                for (let i=0;i <= 12; i++) {
                    $('#history_xii' + i).prop('checked', true).attr("disabled", true);      
                }
                console.log(bulanSudahBayar+ 'true6');

            }
            

                // var total_putri = 0;

                // for (let i=0;i < 13; i++){

                //     $('#id_checkbox' + i).change(function() {
                //             // alert($(this).val());
                //             total_putri += nominal_putri;
                //             console.log($(this).val());
                //             console.log(total_putri);
                //             $("#jumlah_bayar2").val(total_putri);      
                //     });
                // }
            
            
        }
    </script>
@stop