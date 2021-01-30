<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackUpdateRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'feedback_category_id' => 'required',
            'client_name' => ['required','string','min:3','max:20'],
            'email' => ['required','email'],
            'subject' => ['required','string','min:5'],
            'body' => ['required','string','min:20'],
        ];
    }
    public function attributes() : array
    {
        return [
            'feedback_category_id' => 'Категория обращения',
            'client_name' => 'Ваше имя',
            'email' => 'Электронный адрес',
            'subject' => 'Заголовок',
            'body' => 'Текст',
        ];
    }
}
