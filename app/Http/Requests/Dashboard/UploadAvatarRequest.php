<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\ImageFile;

class UploadAvatarRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => [
                'required',
                'file',
                ImageFile::types(['png', 'jpg', 'jpeg'])->max('11mb'),
                Rule::dimensions()->maxWidth(1000)->maxHeight(1000),
            ],
        ];
    }

    public function messages()
    {
        return [
            'avatar' => [
                'dimensions' => 'The uploaded avatar has invalid image dimensions. Allowed maximum dimensions is 1000x1000.',
                'max'        => 'Provided image has great size, image size could be maximum 10 MB',
            ],
        ];
    }
}
