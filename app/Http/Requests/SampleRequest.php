<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleRequest extends FormRequest
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
            'brand'=>'',
            'title'=>'required',
            'branded'               => '',
            'branded.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public  function messages()
    {
        return [
            'title.required'=>'Please submit title/Printing type',
            'branded.required'=>'Please attach sample image'

        ];
    }
}
