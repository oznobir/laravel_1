<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $type
 */
class ChirpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//         return auth('web')->check();
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
            'message' => 'required|string|between:2,255',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'message.required' => 'Текст комментария пустой',
            'message.string' => 'Напишите текст в комментарии',
            'message.between' => 'Текст комментария должен содержать не менее - :min и не более - :max символа(ов)',
            'post_id' => 'Ошибка данных',
            'user_id' => 'Ошибка данных',
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth('web')->id()
        ]);
    }
}
