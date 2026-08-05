<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Ya filtrado por tu middleware admin en las rutas,
        // pero lo dejamos explícito aquí también.
        return $this->user() && $this->user()->is_admin;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['nullable', 'exists:categories,id'],

            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],

            'cover_image' => ['nullable', 'image', 'max:2048'], // 2MB

            'status' => ['required', Rule::in(['draft', 'published'])],
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