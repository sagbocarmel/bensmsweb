<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           'username' => 'required|string|min:3',
            'email' => 'required|email',
            'school_name' => 'required|string|min:3',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:8',
            'confirm_password'=>'required|string|min:8',
            'id_role' => 'required'
        ];
    }
}
