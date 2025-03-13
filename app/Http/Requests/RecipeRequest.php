<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'name' => 'required|string',
            'description'  => 'nullable|string',
            'preparation_time' => 'required|date_format:H:i',
            'cooking_time' => 'required|date_format:H:i',
            'ingredients' => 'required|array',
            'ingredients.*.ingredient' => 'required|string',
            'ingredients.*.quantity' => 'required|string',
            'image_url' => 'nullable|url',
        ];
    }
}
