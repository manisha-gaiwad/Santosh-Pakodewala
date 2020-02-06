<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSellRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' =>'required',
            'item_name.*'  => 'required',
            'quantity.*'  => 'required',
            'price.*'  => 'required',
            'total_price.*'  => 'required'
             'adjustment' => 'required',
             'adjustment_remark' => 'required',
             'total' => 'required'       
             
        ];
    }
}
