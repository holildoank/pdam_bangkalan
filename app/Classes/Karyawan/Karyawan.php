<?php

namespace App\Classes\Karyawan;
use App\User;
use App\Models\data_karyawan;
use App\Models\data_level;

class Karyawan{

	public function data(){
			return data_karyawan::find(\Auth::user()->id_karyawan);
		}
			public function fullName(){
			$user = data_karyawan::find(\Auth::user()->id_karyawan);
			return $user->nm_depan . ' ' . $user->nm_belakang;
		}
			public function level(){
			$levels = data_level::whereId_user(\Auth::user()->id_user)
				->select('id_level_user AS level')
				->get();
			$_level = [];
			foreach($levels as $level){
				$_level[] = $level->level;
			}
			return $_level;
		}
		public function setOnline(){
			$time = time() + 900;
			if(\Auth::check())
				User::find(\Auth::user()->id_user)->update([
					'time_online' => $time
				]);
		}

}
