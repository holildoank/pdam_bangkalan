<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_karyawan extends Model
{
	protected $table = 'data_karyawan';
	protected $primaryKey = 'id_karyawan';
	protected $fillable = [
	    'id_karyawan',
	    'id_profesi',
			'nm_depan',
			'nm_belakang',
			'telp',
			'tempat_lahir',
			'tgl_lahir',
			'sex',
			'alamat',
			'tgl_bergabung',
		];
		public function scopeCarisemua($query, $req = []){
			$ustad = $query->join('ref_profesi', 'ref_profesi.id_profesi', '=', 'data_karyawan.id_profesi');
					$ustad->select('data_karyawan.*', 'ref_profesi.nm_profesi');
		}

    public function scopeCari($query, $nm_depan, $profesi, $req = []){
    	$ustad = $query->join('ref_profesi', 'ref_profesi.id_profesi', '=', 'data_karyawan.id_profesi');
    		if(!empty($nm_depan))
    			$ustad->where('data_karyawan.nm_depan', 'LIKE', '%' .$nm_depan. '%');
    		if(!empty($profesi))
    			$ustad->where('data_karyawan.id_profesi', 'LIKE', '%' .$profesi. '%');
    			$ustad->select('data_karyawan.*', 'ref_profesi.nm_profesi');
    }

}
