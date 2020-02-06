<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sellItems extends Model
{
      
     use SoftDeletes;
     protected $softDelete = true;
    protected $table = 'sell_items';
    protected $fillable = ['total', 'adjustment','adjustment_remark', 'date' ]; 
}
