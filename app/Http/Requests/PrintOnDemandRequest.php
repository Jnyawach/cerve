<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintOnDemandRequest extends FormRequest
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
            'brand_id'=>'required',
            'title'=>'required|max:255|string',
            'description'=>'required',
            'artwork_id'               => 'required',
            'artwork_id.*' => 'image|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf, ai, cdr,eps,psd|max:2048'
        ];
    }
}
