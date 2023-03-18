<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table='tabel_rinci_penjualan';
    protected $primarykey='nota';
    protected $keyType='string';
    // protected $primaryKey ="no_faktur_pembelian";
    // penentuan dibawah dipakai AGAR MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    // public $incrementing = false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    // protected $keyType='string';
    protected $timestamp=true;
    protected $fillable = ['nota', 'kd_barang','nm_barang','jumlah','harga','sub_total_jual','tgl_transaksi'];

}
