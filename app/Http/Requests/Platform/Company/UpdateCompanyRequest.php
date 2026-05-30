<?php

namespace App\Http\Requests\Platform\Company;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // Later:
        // return auth('platform')->user()
        //     ->can('update', $this->route('company'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $company = $this->route('company');

        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('companies', 'email')->ignore($company)],
            'phone' => ['nullable', 'string', 'max:50'],
            'no_of_locations' => ['nullable', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.min' => 'The name field must be at least 3 characters.',
            'name.max' => 'The name field must be less than 255 characters.',
            'email.email' => 'The email field must be a valid email address.',
            'email.max' => 'The email field must be less than 255 characters.',
            'email.unique' => 'The email address has already been taken.',
            'phone.string' => 'The phone field must be a string.',
            'phone.max' => 'The phone field must be less than 50 characters.',
            'no_of_locations.integer' => 'The number of locations field must be an integer.',
            'no_of_locations.min' => 'The number of locations field must be at least 1.',
        ];
    }
}
