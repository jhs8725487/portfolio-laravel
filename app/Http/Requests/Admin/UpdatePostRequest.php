<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->is_admin;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['nullable', 'exists:categories,id'],

            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['sometimes', 'required', 'string'],

            'cover_image' => ['nullable', 'image', 'max:2048'],

            'status' => ['sometimes', 'required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],

            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'content.required' => 'El contenido es obligatorio.',
            'cover_image.image' => 'El archivo debe ser una imagen.',
            'cover_image.max' => 'La imagen no debe superar los 2MB.',
            'status.in' => 'El estado debe ser borrador o publicado.',
        ];
    }
}