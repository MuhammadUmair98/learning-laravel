<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brandName' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'phoneType' => 'required|in:samsung,apple',
            'userId' => 'required|exists:users,id'
        ];
    }
}
