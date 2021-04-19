<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Berita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table){
            $table->increments('id_berita');
            $table->integer('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('foto');
            $table->date('tgl');    
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
        Schema::dropIfExists('berita');

    }
}
