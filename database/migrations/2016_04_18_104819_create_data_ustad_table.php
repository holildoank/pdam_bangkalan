<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUstadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('data_ustad', function (Blueprint $table) {
                      $table->increments('id_ustad');
                      $table->string('nm_depan');
                      $table->string('nm_belakang');
                      $table->string('telp');
                      $table->string('tempat_lahir');
                      $table->string('tgl_lahir');
                      $table->string('alamat');
                      $table->string('tgl_bergabung');
            $table->timestamps();
        });
    }


    public function down()
    {
       Schema::drop('data_ustada');
    }
}
