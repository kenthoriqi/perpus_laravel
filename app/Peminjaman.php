<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = [
        'id',
        'id_anggota',
        'id_buku',
        'id_pegawai',
        'tanggal_pinjam',
        'jatuh_tempo',
        'tanggal_kembali',
        'status',
        'denda'
    ];
    public function anggota(){
      return $this->belongsTo('App\Anggota', 'id_anggota');
    }
    public function buku(){
      return $this->belongsTo('App\Buku', 'id_buku');
    }
      public function pegawai(){
      return $this->belongsTo('App\Pegawai', 'id_pegawai');
    }
}
