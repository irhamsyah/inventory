<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table='tabel_kategori_barang';
    protected $primaryKey ="kd_kategori";
    // penentuan dibawah dipakai AGAR TIDAK MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing= false;
    //Define primary key NOT integer is Important because laravel assume your primarykey is Integer
    protected $keyType='string';
    public $timestamps = true;
    protected $fillable = ['kd_kategori','nm_kategori'];

}
