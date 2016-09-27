<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakturpembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::create('data_faktur_pembayaran', function (Blueprint $table) {
                      $table->increments('id_faktur_pembayaran');
                      $table->string('id_faktur');
                      $table->string('id_santri');
                      $table->string('total');
                      $table->string('id_karyawan');
                      $table->string('status');
                    $table->timestamps();
        });

    
    }

    public function down()
    {
       Schema::drop('data_faktur');
    }