<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
      
     use SoftDeletes;
     protected $softDelete = true;
    protected $fillable = ['date', 'branch_id','item_details','quantity', 'price', 'total_price', 'unit_id' ]; 
}
