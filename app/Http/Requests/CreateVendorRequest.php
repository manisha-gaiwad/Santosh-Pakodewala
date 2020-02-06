<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVendorRequest extends FormRequest
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
            'name' => 'required|string| max:100 ',
            'mob' => 'required|string|unique:vendor|max:10',
            'email' => 'required|string|unique:vendor',
            'business_type_id' => 'required|string',
            'gstin_number' => 'required|string|max:15',
            'pan_number' => 'required|string|unique:vendor',
            'ifc_code' => 'required|string',
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string|unique:vendor',
            'adhar_number' => 'required|string|unique:vendor',
             'address' => 'required|string',
          
        ];
    }
}



    
    
        
            
                
                
                    
                    