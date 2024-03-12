<?php

namespace App\Http\Requests\AccountCredentials;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AccountCredentialsRequest extends FormRequest
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
            'username'=>['string'],
            'password'=>['string'],
            'phone_number'=>['string'],
            'email'=>['string', 'email'],
            'token'=>['string'],
            'other'=>['string']
        ];
    }
    public function messages(): array
    {
        return [
            'username.string' => 'The username should be string.',
            'password.string' => 'The password should be string.',
            'phone_number.string' => 'The phone_number should be string.',
            'email.string' => 'The email should be string.',
            'token.string' => 'The token should be string.',
            'other.string' => 'The other should be string.',
        ];
    }
}
