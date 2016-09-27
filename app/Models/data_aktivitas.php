<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_aktivitas extends Model
{
   protected $table = 'data_aktivitas';
	protected $primaryKey = 'id_aktivitas';
	protected $fillable = [
		'id_ustad',
		'keterangan'
	];
}
