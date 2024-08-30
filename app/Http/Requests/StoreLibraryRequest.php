<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'file_name' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'file_name.required' => trans('validation.required'),
            'Grade_id.required' => trans('validation.required'),
            'Classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
        ];
    }
}
