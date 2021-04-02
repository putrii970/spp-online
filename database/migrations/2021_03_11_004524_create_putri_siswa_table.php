<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutriSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putri_siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->char('nis', 8);
            $table->string('nama');
            $table->bigInteger('putri_kelas_id_kelas')->unsigned();
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->bigInteger('spp_id_spp')->unsigned();
            $table->foreign('putri_kelas_id_kelas')->references('id_kelas')->on('putri_kelas')->onDelete('cascade');
            $table->foreign('spp_id_spp')->references('id_spp')->on('putri_spp')->onDelete('cascade');
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
        Schema::dropIfExists('putri_siswa');
    }
}
