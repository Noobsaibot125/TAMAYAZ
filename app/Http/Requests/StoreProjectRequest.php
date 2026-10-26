<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('title') && ! $this->filled('slug')) {
            $this->merge([
                'slug' => Str::slug((string) $this->input('title')).'-'.Str::lower(Str::random(4)),
            ]);
        }

        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
        ]);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug'],
            'sector' => ['required', 'string', Rule::in(['medical', 'mobilier', 'genie_civil'])],
            'client_type' => ['required', 'string', 'max:150'],
            'location' => ['required', 'string', 'max:150'],
            'summary' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'completed_at' => ['nullable', 'date'],
            'is_featured' => ['required', 'boolean'],
        ];
    }
}
