<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    //
    protected $table='keranjang';
    // protected $primaryKey ="kd_barang";
    // penentuan dibawah dipakai AGAR MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    // public $incrementing = false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    // protected $keyType='string';
    protected $timestamp=true;
    protected $fillable = ['kd_barang', 'nm_barang','jumlah','harga','stok'];

}
