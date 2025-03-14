<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
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
            'name' => 'nullable|string',
            'description'  => 'nullable|string',
            'preparation_time' => 'nullable|date_format:H:i',
            'cooking_time' => 'nullable|date_format:H:i',
            'ingredients' => 'nullable|array',
            'ingredients.*.ingredient' => 'required_with:ingredients|string',
            'ingredients.*.quantity' => 'required_with:ingredients|string',
            'image_url' => 'nullable|url',
        ];
    }
}
