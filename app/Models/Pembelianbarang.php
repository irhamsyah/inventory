<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelianbarang extends Model
{
    protected $table='tabel_rinci_pembelian';
    // protected $primaryKey ="no_faktur_pembelian";
    // penentuan dibawah dipakai AGAR MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    // public $incrementing = false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    // protected $keyType='string';
    protected $timestamp=true;
    protected $fillable = ['no_faktur_pembelian', 'kd_barang','nm_barang','satuan','jumlah','harga','sub_total_beli','tgl_beli'];
}
