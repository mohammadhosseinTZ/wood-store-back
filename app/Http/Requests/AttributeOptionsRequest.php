<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeOptionsRequest extends FormRequest
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
            "attribute_id" => [
                "required",
                "integer",
                Rule::exists("attributes", "id")
            ],

            "value" => [
                "required",
                "string",
                Rule::unique("attribute_options", "value")
                    ->where("attribute_id", $this->input("attribute_id"))
            ]
        ];
    }
}
