<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required|max:140'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '必須項目です',
            'body.required' => '必須項目です',
            'body.max' => '140字以内で入力してください',
        ];
    }
}
