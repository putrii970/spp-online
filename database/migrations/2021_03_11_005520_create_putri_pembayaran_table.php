<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutriPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putri_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->bigInteger('petugas_id')->unsigned();
            $table->char('nisn');
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 12);
            $table->string('tahun_dibayar', 4);
            $table->bigInteger('spp_id')->unsigned();
            $table->integer('jumlah_bayar');
            $table->foreign('petugas_id')->references('id_petugas')->on('putri_petugas')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('putri_siswa')->onDelete('cascade');
            $table->foreign('spp_id')->references('spp_id')->on('putri_siswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('putri_pembayaran');
    }
}
