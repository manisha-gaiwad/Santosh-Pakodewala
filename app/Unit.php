<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
     use SoftDeletes;

     protected $softDelete = true;
    
     protected $table = 'units';
     protected $primaryKey = 'unit_id';
     protected $fillable = ['unit_id', ' unit'];
}
  