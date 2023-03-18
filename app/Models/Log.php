<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    public $timestamps = true;
    protected $fillable = ['nama_pic', 'jabatan','tanggal','keterangan','snid','merkpc','modelpc','bentuk','cabang'];

}
