<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datahpaompantas extends Model
{
    protected $table="datahpaompantas";
    protected $primaryKey ="imei";
    // penentuan dibawah dipakai AGAR TIDAK MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing=false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    protected $typeKey = 'string';
    public $timestamps = true;
    protected $fillable = ['imei','snid','merk','model'];
}
