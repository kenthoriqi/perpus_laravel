<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $fillable = [
        'namaa',
        'nisn',
        'kelas',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'ava'
    ];
    public function peminjaman(){
      return $this->hasMany('App\Peminjaman', 'id_anggota');
    }
}
