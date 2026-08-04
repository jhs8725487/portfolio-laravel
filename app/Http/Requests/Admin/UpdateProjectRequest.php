<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_type_id' => ['required', 'exists:project_types,id'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:500'],
            'problem' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],
            'results' => ['nullable', 'string'],
            'challenges' => ['nullable', 'string'],
            'lessons_learned' => ['nullable', 'string'],
            'repo_url' => ['nullable', 'url', 'max:255'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'featured' => ['boolean'],
            'status' => ['required', 'in:draft,published,archived'],
            'published_at' => ['nullable', 'date'],
            'order' => ['nullable', 'integer', 'min:0'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['exists:technologies,id'],
        ];
    }
}