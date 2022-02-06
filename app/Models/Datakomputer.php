<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datakomputer extends Model
{
    //
    protected $table="datakomputer";
    protected $primaryKey ="snid";
    // penentuan dibawah dipakai AGAR TIDAK MEMUNCULKAN 0 saat menampilkan Data dalam bentuk Tabel yang dapa di EDIT
    public $incrementing= false;
    //Define primary key not integer is Important because laravel assume your primarykey is Integer
    protected $keyType='string';
    public $timestamps = true;
    protected $fillable = ['snid', 'modelpc','typepc'];
    
}
