<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutriKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putri_kelas', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->string('nama_kelas');
            $table->bigInteger('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')->references('id_jurusan')->on('putri_jurusan')->onDelete('cascade');
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
        Schema::dropIfExists('putri_kelas');
    }
}
