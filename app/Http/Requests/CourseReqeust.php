<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseReqeust extends FormRequest
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
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'summary'=>'required|max:400',
            'name'=>'required',
            'fees'=>'required|numeric',
            'level'=>'required|numeric',
            'seats'=>'required|numeric',
            'discount'=>'required|numeric',
        ];
    }
}
        