<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vendor extends Model
{

	  
     use SoftDeletes;
     protected $softDelete = true;
     protected $table = 'vendor';
     protected $fillable = ['name','mob', 'email', 'business_type_id', 'gstin_number', 'pan_number', 'ifc_code', 'bank_name', 'bank_account_number', 'adhar_number', 'address' ];

     public function invoice() 
   {
      return $this->hasMany('App\Invoice');
   }

}
