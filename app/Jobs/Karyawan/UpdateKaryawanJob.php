<?php

namespace App\Jobs\Karyawan;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Models\data_karyawan;
class UpdateKaryawanJob extends Job implements SelfHandling
{
    public $req;
    /**
     * Create a new job instance.
     *
     * @return void
     */
   public function __construct(array $req)
    {
       $this->req=$req;
    }


    public function handle()
    {
       data_karyawan::find($this->req['id_karyawan'])
            ->update([
                'nm_depan'      =>$this->req['nm_depan'],
                'nm_belakang'   =>$this->req['nm_belakang'],
                'telp'          =>$this->req['telp'],
                'tempat_lahir'  =>$this->req['tempat_lahir'],
                'tgl_lahir'     =>$this->req['tgl_lahir'],
                'sex'           =>$this->req['sex'],
                'id_profesi'    =>$this->req['id_profesi'],
                'alamat'        =>$this->req['alamat'],
                'tgl_bergabung' =>$this->req['tgl_bergabung'],


                ]);
        return $this->req;
    }
}
