<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sell extends Model
{
      
     use SoftDeletes;
     protected $softDelete = true;

    protected $table = 'sell_details';
    protected $fillable = ['sell_item_id','item_name', 'quantity','price','total_price' ]; 
}
