<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
       
     use SoftDeletes;

     protected $SoftDeletes = true;
     protected $fillable= ['vendor_id', 'invoice_date', 'payment_mode', 'net_amount','paid_amount', 'remaining_amount', 'remark', 'status', 'invoice_status_id', 'invoice_number', 'challan_number', 'net_amount'];

    public function vendor() {
	return $this->belongsTo('App\Vendor', 'vendor_id')->withTrashed();
    }


}
