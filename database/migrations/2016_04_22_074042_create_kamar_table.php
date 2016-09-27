<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('data_kamar', function (Blueprint $table) {
                      $table->increments('id_kamar');
                      $table->string('kode_kamar');
                      $table->string('nm_kamar');
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
        Schema::drop('data_kamar');
    }
}
