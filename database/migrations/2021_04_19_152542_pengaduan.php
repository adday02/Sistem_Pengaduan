<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table){
            $table->increments('id_pengaduan');
            $table->string('nik');
            $table->foreign('nik')->references('nik')->on('masyarakat');
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('foto');
            $table->date('tgl');
            $table->string('status');
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
        Schema::dropIfExists('pengaduan');
    }
}
