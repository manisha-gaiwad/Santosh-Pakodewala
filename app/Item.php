<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
       
     use SoftDeletes;
     protected $softDelete = true;
     protected $fillable = ['name','price', 'quantity', 'unit_id'];
}
