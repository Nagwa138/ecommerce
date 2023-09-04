<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => ['nullable', 'string', 'max:100'],
            'desc' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:10000'],
            'quantity' => ['nullable', 'int'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['int', 'exists:categories,id']
        ];
    }
}
