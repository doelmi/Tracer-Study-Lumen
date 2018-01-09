<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Foto extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable,
        Authorizable;

    public $primaryKey = 'nim';
    public $table = 'foto';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim', 'foto'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'foto'
    ];
    protected $appends = ['foto_src'];

    public static function base64ToImage($imageData, $nim) {
        list($type, $imageData) = explode(';', $imageData);
        list(, $extension) = explode('/', $type);
        list(, $imageData) = explode(',', $imageData);
        $fileName = $nim . '_' . uniqid() . '.' . $extension;
        $path = "assets/img/$fileName";
        $imageData = base64_decode($imageData);
        file_put_contents($path, $imageData);

        $link_path = $path;
        return $link_path;
    }

    public function getFotoSrcAttribute() {
        return url($this->foto);
    }

}
