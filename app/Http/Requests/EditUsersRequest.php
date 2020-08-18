<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUsersRequest extends FormRequest
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
            //
            'name'=>'required|min:3|max:50',
            'lastname'=>'required|min:3|max:50',
            'email'=>'required|email|',
            'password' => 'min:8|string|confirmed',
            'password_confirmation'=>'',
            'cellphone' =>'required|digits:10|numeric',
            'country'=> 'min:3|max:50',
            'town'=>'min:3|max:50',
            'is_active'=>'',
            'role_id'=>'',
            'street'=>'min:3|max:50'
        ];
    }
}
