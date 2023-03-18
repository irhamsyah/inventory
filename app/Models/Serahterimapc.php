<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serahterimapc extends Model
{
    // protected $table="serahterimapcs";
    public $timestamps = true;
    protected $fillable = ['nama_pic', 'jabatan','snid','snidmonitor','merkpc','modelpc','tanggal','bentuk','cabang'];
}
