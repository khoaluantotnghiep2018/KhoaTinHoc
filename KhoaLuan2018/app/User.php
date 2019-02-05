<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tintuc(){
        $this->hasMany('App\Model\TinTuc','id_user','id'); 
    }

    public function binhluan(){
        $this->hasMany('App\Model\BinhLuan','id_user','id');
    }

    public function chitietbinhluan(){
        $this->hasMany('App\Model\ChiTietBinhLuan','id_user','id');  
    }
}
