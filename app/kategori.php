<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $table = 'kategori';
    protected $fillable = [
        'id',
        'nama_kategori'
    ];
    public function buku(){
      return $this->hasMany('App\Buku', 'id_kategori');
    }
}
