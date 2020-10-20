<?php

namespace App\Http\Requests;

use App\Rules\AllowableImageSize;
use App\Rules\OnlyOneImage;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'vopros' => ['required', new OnlyOneImage, new AllowableImageSize],
            'otvet1' => ['required', new OnlyOneImage, new AllowableImageSize],
            'otvet2' => ['required', new OnlyOneImage, new AllowableImageSize],
            'otvet3' => ['required', new OnlyOneImage, new AllowableImageSize],
            'otvet4' => ['required', new OnlyOneImage, new AllowableImageSize],
            'otvet5' => ['required', new OnlyOneImage, new AllowableImageSize],
        ];
    }

    public function messages()
    {
        return [
            'vopros.required' => "Поле Вопрос обязательно для заполнения.",
            'otvet1.required' => "Поле Ответ 1 обязательно для заполнения.",
            'otvet2.required' => "Поле Ответ 2 обязательно для заполнения.",
            'otvet3.required' => "Поле Ответ 3 обязательно для заполнения.",
            'otvet4.required' => "Поле Ответ 4 обязательно для заполнения.",
            'otvet5.required' => "Поле Ответ 5 обязательно для заполнения.",
        ];
    }
}
