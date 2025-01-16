<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email:rfc,dns,spoof',
                'max:255',
            ],
            'url' => [
                'nullable',
                'url',
                'max:255',
            ],
            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'dimensions:min_width=100,min_height=100',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The company name is required.',
            'name.string' => 'The company name must be a valid text.',
            'name.max' => 'The company name may not be greater than 255 characters.',

            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',

            'url.url' => 'Please provide a valid URL.',
            'url.max' => 'The URL may not be greater than 255 characters.',

            'logo.image' => 'The logo must be an image file.',
            'logo.mimes' => 'The logo must be in one of the following formats: JPG, JPEG, PNG.',
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
        ];
    }
}
