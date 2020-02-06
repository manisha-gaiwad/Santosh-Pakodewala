<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
           

            'vendor_id' => 'required',
            'invoice_status_id' => 'required',
            'payment_mode' =>'required',
            'challan_number' =>'required',
            'item_name.*'  => 'required',
            'quantity.*'  => 'required',
            'price.*'  => 'required',
            'total_price.*'  => 'required',
           
          
        ];
    }
}
