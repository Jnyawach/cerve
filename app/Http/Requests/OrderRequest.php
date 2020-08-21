<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'description'=>'required',
            'printing'=>'required',
            'artwork_id'               => 'required',
            'artwork_id.*' => 'image|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf, ai, cdr,eps,psd|max:2048'
        ];
    }
}
