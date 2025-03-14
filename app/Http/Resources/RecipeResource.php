<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'preparation_time' => Carbon::parse($this->preparation_time)->format('H\h i\m'),
            'cooking_time' =>  Carbon::parse($this->cooking_time)->format('H\h i\m'),
            'ingredients' => $this->ingredients,
            'image_url' => $this->image_url,
        ];
    }
}
