<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "parent_id" => ["nullable", Rule::exists("categories", "id")],
            "slug" => [
                "required",
                Rule::unique("categories", "slug")->ignore($this->route('categories'))
            ],

            "name" => ["required", "string"],
            "description" => ["nullable", "string"],
            "image" => ["nullable",  'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            "is_active" => ["nullable", "boolean"],
            "sort_order" => ["nullable", "integer"],
        ];
    }
}
