<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'nullable',
                'email:rfc,dns,spoof',
                'max:255',
            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^\+?[0-9]{10,15}$/',
                'max:15',
            ],
            'company_id' => [
                'required',
                'integer',
                'exists:companies,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a valid text.',
            'first_name.max' => 'First name cannot exceed 255 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a valid text.',
            'last_name.max' => 'Last name cannot exceed 255 characters.',

            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',

            'phone.regex' => 'Please provide a valid phone number (e.g., +1234567890).',
            'phone.max' => 'Phone number cannot exceed 15 characters.',

            'company_id.required' => 'Please select a company.',
            'company_id.integer' => 'Company ID must be a valid integer.',
            'company_id.exists' => 'The selected company does not exist.',
        ];
    }
}
