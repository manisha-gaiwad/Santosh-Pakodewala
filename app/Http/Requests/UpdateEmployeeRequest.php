<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string| max:100 ',
            'last_name' => 'required|string| max:100 ',
            'email' => 'required ',
            'mob' => 'required ',
            'branch_id' => 'required',
            'salary' => 'required|string| max:100 ',
            'file' => 'required|sometimes',
            'aadhar_no' => 'required|string| max:100 ',
            'address' => 'required|string| max:100 '
        ];
    }
}
