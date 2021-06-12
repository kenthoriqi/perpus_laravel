<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $fillable = [
        'id',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'ava'
    ];
    public function pegawai(){
      return $this->hasMany('App\Pegawai', 'id_pegawai');
    }
}
