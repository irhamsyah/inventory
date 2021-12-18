<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datahpaompantas extends Model
{
    protected $table="datahpaompantas";
    protected $primaryKey ="snid";
    public $timestamps = true;
    protected $fillable = ['imei','snid','merk','model'];
}
