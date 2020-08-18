<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'title' =>'required',
            'client' =>'required',
            'is_active'=>'required|numeric',
            'category_id'=>'required|numeric',
            'description'=>'required',
            'video_id'=>'',
            'path'               => '',
            'path.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
