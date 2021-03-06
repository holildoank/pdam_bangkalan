<?php
	
	namespace App\Classes\Format;

	use App\User;


	class Format{

		static $seri = 1;

		////////////////////////////////////// WAKTU /////////////////////////////////////////////////////
		public function indoDate($waktu = ''){
			if($waktu == '0000-00-00'){
				$tanggal = '-';
			}else{
				$waktu = empty($waktu) ? date('Y-m-d') : $waktu;
				$bulan = $this->nama_bulan(date('m', strtotime($waktu)));
				$tanggal = date('d', strtotime($waktu)) . ' ' . $bulan . ' ' . date('Y', strtotime($waktu));
			}
			return $tanggal;
		}

		public function indoDate2($waktu = ''){
			if($waktu == '0000-00-00'){
				$tanggal = '-';
			}else{
				$waktu = empty($waktu) ? date('Y-m-d') : $waktu;
				$bulan = $this->nama_bulan_alias(date('m', strtotime($waktu)));
				$tanggal = date('d', strtotime($waktu)) . ' ' . $bulan . ' ' . date('Y', strtotime($waktu));
			}
			return $tanggal;
		}

		public function jam($waktu){
			return date('h:i A', strtotime($waktu));
		}
		public function time_stamp($ptime){
			$etime = time() - strtotime($ptime);

		    if ($etime < 1)
		    {
		        return 'Baru saja';
		    }
		    $a = array( 12 * 30 * 24 * 60 * 60  =>  'tahun',
		                30 * 24 * 60 * 60       =>  'bulan',
		                24 * 60 * 60            =>  'hari',
		                60 * 60                 =>  'jam',
		                60                      =>  'menit',
		                1                       =>  'detik'
		                );
		    foreach ($a as $secs => $str)
		    {
		        $d = $etime / $secs;
		        if ($d >= 1)
		        {
		            $r = round($d);
		            return $r . ' ' . $str . ($r > 1 ? '' : '') . ' yang lalu';
		        }
		    }
		}

		public function hari($waktu){
			$day = strtotime($waktu);
			return $this->nama_hari(date('N', $day));
		}

		public function selisih_hari($start, $end){
			$start 	= date('Y-m-d', strtotime($start));
		    $end 	= date('Y-m-d', strtotime($end));
		    
		    $st	= strtotime($start);
		    $en	= strtotime($end);
		    
		    $diff = abs($en - $st);
		    return $diff / 86400;
		}

		public function nama_hari($no){

			switch($no):
				case 1:
					return 'Senin';
					break;
				case 2:
					return 'Selasa';
					break;
				case 3:
					return 'Rabu';
					break;
				case 4:
					return 'Kamis';
					break;
				case 5:
					return 'Jum\'at';
					break;
				case 6:
					return 'Sabtu';
					break;
				case 7:
					return 'Minggu';
					break;
			endswitch;
		}

		public function online($id_user){
			$user = User::find($id_user);
			if($user->time_online > time()){
				return true;
			}else{
				return false;
			}
		}

		public function substr($text, $limit = 10){
			if(strlen($text) > $limit)
				return substr($text, 0, $limit) . '...';
			else
				return $text;
		}

		public function code($num, $max = 6){
			$count = strlen($num);
			$numb = '';
			$limit = $max > $count ? $max - $count : 0;
			for($i=0;$i<$limit;$i++){
				$numb .= 0;
			}
			$numb .= $num;
			return $numb;
		}

	
		public function nama_bulan($no_bulan) {
			switch($no_bulan) {
				case 1:
					$nama_bulan = 'Januari';
					break;
				case '01':
					$nama_bulan = 'Januari';
					break;
				case 2:
					$nama_bulan = 'Februari';
					break;
				case '02':
					$nama_bulan = 'Februari';
					break;
				case 3:
					$nama_bulan = 'Maret';
					break;
				case '03':
					$nama_bulan = 'Maret';
					break;
				case 4:
					$nama_bulan = 'April';
					break;
				case '04':
					$nama_bulan = 'April';
					break;
				case 5:
					$nama_bulan = 'Mei';
					break;
				case '05':
					$nama_bulan = 'Mei';
					break;
				case 6:
					$nama_bulan = 'Juni';
					break;
				case '06':
					$nama_bulan = 'Juni';
					break;
				case 7:
					$nama_bulan = 'Juli';
					break;
				case '07':
					$nama_bulan = 'Juli';
					break;
				case 8:
					$nama_bulan = 'Agustus';
					break;
				case '08':
					$nama_bulan = 'Agustus';
					break;
				case 9:
					$nama_bulan = 'September';
					break;
				case '09':
					$nama_bulan = 'September';
					break;
				case 10:
					$nama_bulan = 'Oktober';
					break;
				case 11:
					$nama_bulan = 'November';
					break;
				case 12:
					$nama_bulan = 'Desember';
					break;
			}
			return $nama_bulan;
		}

		public function nama_bulan_alias($no_bulan) {
			switch($no_bulan) {
				case 1:
					$nama_bulan = 'Jan';
					break;
				case '01':
					$nama_bulan = 'Jan';
					break;
				case 2:
					$nama_bulan = 'Feb';
					break;
				case '02':
					$nama_bulan = 'Feb';
					break;
				case 3:
					$nama_bulan = 'Mar';
					break;
				case '03':
					$nama_bulan = 'Mar';
					break;
				case 4:
					$nama_bulan = 'Apr';
					break;
				case '04':
					$nama_bulan = 'Apr';
					break;
				case 5:
					$nama_bulan = 'Mei';
					break;
				case '05':
					$nama_bulan = 'Mei';
					break;
				case 6:
					$nama_bulan = 'Jun';
					break;
				case '06':
					$nama_bulan = 'Jun';
					break;
				case 7:
					$nama_bulan = 'Jul';
					break;
				case '07':
					$nama_bulan = 'Jul';
					break;
				case 8:
					$nama_bulan = 'Agu';
					break;
				case '08':
					$nama_bulan = 'Agu';
					break;
				case 9:
					$nama_bulan = 'Sep';
					break;
				case '09':
					$nama_bulan = 'Sep';
					break;
				case 10:
					$nama_bulan = 'Okt';
					break;
				case 11:
					$nama_bulan = 'Nop';
					break;
				case 12:
					$nama_bulan = 'Des';
					break;
			}
			return $nama_bulan;
		}

		////////////////////////////////////// END WAKTU //////////////////////////////////////////////////


	
		/////////////////////////////////////////////////////////////////

		function terbilang($x) {

		  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		  if ($x < 12)
		    return " " . $abil[$x];
		  elseif ($x < 20)
		    return $this->terbilang($x - 10) . "belas";
		  elseif ($x < 100)
		    return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
		  elseif ($x < 200)
		    return " seratus" . $this->terbilang($x - 100);
		  elseif ($x < 1000)
		    return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
		  elseif ($x < 2000)
		    return " seribu" . $this->terbilang($x - 1000);
		  elseif ($x < 1000000)
		    return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
		  elseif ($x < 1000000000)
		    return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
		}

		
	}