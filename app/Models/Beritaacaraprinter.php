<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beritaacaraprinter extends Model
{
    public $timestamps = true;
    protected $fillable = ['nama_pic', 'jabatan','tanggal','snid','merk','model'];
}
