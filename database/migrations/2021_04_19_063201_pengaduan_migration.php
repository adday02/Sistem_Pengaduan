<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengaduanMigration extends Migration
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
            $table->string('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('masyarakat');
           $table->date('tgl_pengaduan');
           $table->string('foto');
           $table->string('lokasi');
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
