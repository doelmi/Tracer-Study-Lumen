<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Mahasiswa extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable,
        Authorizable;

    public $primaryKey = 'nim';
    public $table = 'mahasiswas';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim', 'nama', 'alamat', 'no_telepon', 'tempat_lahir', 'tanggal_lahir'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function akademik() {
        return $this->hasOne('App\Akademik', 'nim');
    }

    public function foto() {
        return $this->hasOne('App\Foto', 'nim');
    }

    public function pekerjaan() {
        return $this->hasOne('App\Pekerjaan', 'nim');
    }

    public function krisar() {
        return $this->hasOne('App\Krisar', 'nim');
    }
    
    public function mahasiswa_login() {
        return $this->hasOne('App\Mahasiswa_Login', 'nim');
    }

}
