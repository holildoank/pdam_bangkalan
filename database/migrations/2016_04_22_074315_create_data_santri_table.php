<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('data_santri', function (Blueprint $table) {
              $table->increments('id_santri');
               $table->string('nis');
              $table->string('nm_depan');
              $table->string('nm_belakang');
              $table->string('tempat_lahir');
              $table->string('tgl_lahir');
              $table->string('alamat');
              $table->string('tgl_masuk');
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
        Schema::drop('data_santri');
    }
}
