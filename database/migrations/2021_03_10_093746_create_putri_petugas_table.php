<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutriPetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putri_petugas', function (Blueprint $table) {
            $table->bigIncrements('id_petugas');
            $table->string('username');
            $table->string('password');
            $table->string('nama_petugas');
            $table->enum('level', ['admin', 'petugas']);
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
        Schema::dropIfExists('putri_petugas');
    }
}
