<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beritaacarakomputer extends Model
{
    public $timestamps = true;
    protected $fillable = ['nama_pic', 'jabatan','tanggal','snid','merkpc','modelpc'];
}
