<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $type
 */
class NameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|between:2,10',
            'last_name' => 'required|between:2,10',
            'type' => 'required|between:2,10',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Не заполнено поле Имя',
            'first_name.between' => 'Поле Имя должно содержать не менее - :min и не более - :max символа(ов)',
            'last_name.required' => 'Не заполнено поле Фамилия',
            'last_name.between' => 'Поле Фамилия должно содержать не менее - :min и не более - :max символа(ов)',
            'type.required' => 'Не заполнено поле Тип работника',
            'type.between' => 'Поле Тип работника должно содержать не менее - :min и не более - :max символа(ов)',
        ];
    }
}
