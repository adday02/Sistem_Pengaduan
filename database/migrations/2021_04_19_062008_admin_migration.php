<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('admin', function (Blueprint $table){
            $table->increments('id_admin');
           $table->string('username')->unique();
            $table->string('password');
             $table->string('jk');
              $table->string('nama');
               $table->string('no_hp');
                $table->string('foto');
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
        Schema::dropIfExists('admin');
    }
}
