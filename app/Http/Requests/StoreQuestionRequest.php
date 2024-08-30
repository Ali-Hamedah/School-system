<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'answers' => ['required', 'regex:/^[^-\s]+(-[^-\s]+)*$/'],
            'right_answer' => 'required',
            'score' => 'required',
            'quizze_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'answers.required' => trans('validation.required'),
            'answers.regex' => 'يجب كتابة الإجابات بالشكل الصحيح، مع استخدام "-" للفصل بين كل جواب.',
            'right_answer.required' => trans('validation.required'),
            'score.required' => trans('validation.required'),
            'quizze_id.required' => trans('validation.required'),
        ];
    }
}
