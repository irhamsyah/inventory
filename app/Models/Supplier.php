<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table="tabel_supplier";
    protected $primaryKey ="kd_supplier";
    // penentuan dibawah dipakai AGAR TIDAK MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing= false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    protected $keyType='string';
    public $timestamps = true;
    protected $fillable = ['kd_supplier','nm_supplier','almt_supplier', 'tlp_supplier','fax_supplier'];

}
