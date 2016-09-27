<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ref_tingkatan extends Model
{
protected $tabel ='ref_tingkatan';
protected $primaryKey ='id_tingkatan';
protected $fillable = [
			'id_tingkatan',
			'tingkatan',
			];
}
