<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Models\data_level;
use App\User;
use App\Models\data_karyawan;

class CreateUserJob extends Job implements SelfHandling
{

    public $req;

    public function __construct(array $req){
        $this->req = $req;
    }

    public function handle()
    {
        //dd($this->req);
        $ustad = data_karyawan::find($this->req['id_karyawan']);
        $user = User::create([
            'id_karyawan'   =>$this->req['id_karyawan'],
            'name'          =>$ustad->nm_depan. ' '.$ustad->nm_belakang,
            'username'      =>$this->req['username'],
            'password'      =>bcrypt($this->req['password']),
            'permission'    =>$this->req['permission']
            ]);
        foreach ($this->req['levels'] as $level) {

                  data_level::firstOrCreate([
                   'id_user' => $user->id_user,
                'id_level_user' => $level
                ]);
            # code...
        }
        return $user;
    }
}
