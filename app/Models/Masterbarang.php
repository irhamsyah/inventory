<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterbarang extends Model
{
    protected $table='tabel_barang';
    protected $primaryKey ="kd_barang";
    // penentuan dibawah dipakai AGAR MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing = false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    protected $keyType='string';
    protected $timestamp=true;
    protected $fillable = ['kd_barang', 'nm_barang','jml_barang','kd_satuan','kd_kategori','hrg_jual','hrg_beli'];
}
