<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataprinter extends Model
{
    //
    protected $table='dataprinter';
    protected $primaryKey ="snid";
    // penentuan dibawah dipakai AGAR MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing = false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    protected $keyType='string';
    protected $timestamp=true;
    protected $fillable = ['snid', 'model','merk'];

}
