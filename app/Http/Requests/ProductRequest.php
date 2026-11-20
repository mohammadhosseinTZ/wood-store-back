<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            "name" => ["required", "string", "max:255"],

            "slug" => [
                "required",
                "string",
                "max:255",
                Rule::unique("products", "slug")
            ],

            "description" => ["required", "string"],

            "short_description" => ["nullable", "string"],

            "sku" => [
                "nullable",
                "string",
                "max:255",
                Rule::unique("products", "sku")
            ],

            "image" => ["nullable",  'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            "meta_title" => ["nullable", "string", "max:255"],

            "meta_description" => ["nullable", "string"],

            "status" => ["sometimes", "boolean"],

            "is_featured" => ["sometimes", "boolean"],

            "category_id" => [
                "required",
                "integer",
                Rule::exists("categories", "id")
            ],
        ];
    }
}
