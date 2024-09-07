<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:users', 'min:3', 'max:15'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ];
    }

    public function messages()
    {
        return [
          'name' => [
              'unique' => 'The login has already been taken',
              'max' => 'The login must not be greater than 15 characters.',
              'min' => 'The login must be at least 3 characters.',
          ]
        ];
    }
}
