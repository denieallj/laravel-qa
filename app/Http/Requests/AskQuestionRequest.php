<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' =>'required'
        ];
    }

    /**
     * Custom error messages by dj
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'We sorta need your title here!',
            'title.max' => 'Hold back on your title there!',

            'body.required' => 'We kinda need your question body too you know!'
        ];
    }
}
