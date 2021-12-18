<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datakomputer extends Model
{
    //
    protected $table="datakomputer";
    protected $primaryKey ="snidpc";
    public $timestamps = true;
    protected $fillable = ['snidpc', 'modelpc','typepc'];
    
}
