<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = "bukus";
    protected $fillable =[
        'id',
        'id_kategori',
        'kode_buku',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'jumlah',
        'ava'
    ];
    public function kategori(){
      return $this->belongsTo('App\kategori', 'id_kategori');
    }
    public function peminjaman(){
      return $this->hasMany('App\Peminjaman', 'id_buku');
    }
}
