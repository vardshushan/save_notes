<?php

namespace App\Http\Requests\Links;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
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
            'title'=>['required', 'string', 'min:3'],
            'link'=>['required', 'string', 'min:5']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title should be string',
            'title.min' => 'The titles min length is 3',
            'link.required' => 'The link is required.',
            'link.string' => 'The link should  be string.',
            'link.min' => 'The links min length is 3.',
        ];
    }
}
