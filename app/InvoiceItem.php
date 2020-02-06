<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
      
     use SoftDeletes;
     protected $softDelete = true;
    protected $fillable= ['invoice_id','item_name', 'quantity', 'price', 'total_price'];
}
