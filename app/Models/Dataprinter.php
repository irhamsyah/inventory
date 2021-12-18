<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataprinter extends Model
{
    //
    protected $table='dataprinter';
    protected $primaryKey ="snid";
    protected $timestamp=true;
    protected $fillable = ['snid', 'model','type'];

}
