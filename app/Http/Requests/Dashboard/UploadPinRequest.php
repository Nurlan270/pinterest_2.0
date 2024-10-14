<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\ImageFile;

class UploadPinRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:75'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['required', 'file', ImageFile::types(['png', 'jpg', 'jpeg'])->max('28mb')],
        ];
    }

    public function messages()
    {
        return [
          'image' => [
              'max' => 'Image size must not be greater than 25 MB'
          ]
        ];
    }
}
