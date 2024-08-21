<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category does not exist',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be jpeg, jpg, png',
        ];
    }
}
