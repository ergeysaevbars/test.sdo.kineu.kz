<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestsRequest extends FormRequest
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
            'name_test' => ['required'],
            'type_test' => ['required', 'not_in:0'],
        ];
    }

    /**
     * Сообщения валидации для создания/редактирования теста.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_test.required' => "Название теста не может быть пустым",
            'type_test.not_in' => "Не выбран тип теста"
        ];
    }
}
