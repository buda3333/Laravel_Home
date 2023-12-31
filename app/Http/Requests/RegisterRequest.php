<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:64'],
            'email' => ['required', 'string', 'email', 'unique:users', 'min:6', 'max:64'],
            'phone' => ['required', 'string','unique:users', 'min:6', 'max:24'],
            'password' => ['required', 'string', 'confirmed' , 'min:6', 'max:24'],
            'password_confirmation' => ['required']
        ];
    }
}
