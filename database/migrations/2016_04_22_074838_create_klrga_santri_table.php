<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlrgaSantriTable extends Migration
{

    public function up()
    {
         Schema::create('klrg_santri', function (Blueprint $table) {
                        $table->increments('id_klrga');
                        $table->string('id_santri');
                        $table->string('nm_depan');
                        $table->string('nm_belakang');
                        $table->string('hubungan');
                        $table->string('sex');
                        $table->string('tempat_lahir');
                        $table->string('tgl_lahir');
                        $table->string('pendidikan');
                        $table->string('pekerjaan');
                         $table->timestamps();
        }); 
    }

    public function down()
    {
        Schema::drop('klrg_santri');
    }
}
