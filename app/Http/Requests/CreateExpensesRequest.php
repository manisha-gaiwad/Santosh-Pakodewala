<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpensesRequest extends FormRequest
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
             'branch_id' => 'required|string',
            'item_details' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total_price' =>'required',
            'unit_id' =>'required' 
        ];
    }
}
