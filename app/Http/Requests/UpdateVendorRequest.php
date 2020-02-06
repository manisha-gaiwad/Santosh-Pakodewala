<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
            'mob' => 'required|string',
            'email' => 'required|string',
            'business_type_id' => 'required|string',
            'gstin_number' => 'required|string',
            'pan_number' => 'required|string',
            'ifc_code' => 'required|string',
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string',
            'adhar_number' => 'required|string',
             'address' => 'required|string',
          
        ];
    }
}
