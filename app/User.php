<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


    protected $table = 'users';
    protected $primaryKey = 'id_user';

      protected $fillable = [
        'id_karyawan',
        'name',
        'username',
        'password',
        ' id_level',
        'time_online',
        'status',
        'permission',
        'avatar',

    ];


    protected $hidden = ['password', 'remember_token'];
}
