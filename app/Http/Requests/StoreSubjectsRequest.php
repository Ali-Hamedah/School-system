<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectsRequest extends FormRequest
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
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'Grade_id' => 'required',
            'Class_id' => 'required',
            'teacher_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'Grade_id.required' => trans('validation.required'),
            'Class_id.required' => trans('validation.required'),
            'teacher_id.required' => trans('validation.required'),
        ];
    }
}
