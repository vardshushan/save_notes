<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>['required', 'string', 'max:255', 'min:2'],
            'email'=>['required', 'string', 'email', 'unique:users,email'],
            'password'=>['required', 'string', 'min:8']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name should be string',
            'name.max' => 'The name should be max 255 character.',
            'name.min' => 'The name should be min 2 character.',
            'email.required' => 'The email is required.',
            'email.string' => 'The email should be string',
            'email.email' => 'The email is wrong.',
            'email.unique' => 'The email should be unique.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password should  be string',
            'password.min' => 'The password should ber min 8 character.',
        ];
    }
}
