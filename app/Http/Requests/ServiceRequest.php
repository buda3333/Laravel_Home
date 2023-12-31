<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 *@deprecated
 */
class ServiceRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:6','unique:users', 'max:24'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'is_active' => ['boolean']
        ];
    }

    public function messages(): array
    {
        return  [
            'name' => 'Ошибка'
        ];
    }
}
