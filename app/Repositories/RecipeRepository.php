<?php

namespace App\Repositories;

use App\Interfaces\RecipeRepositoryInterface;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function saveRecipe(array $validatedData) : Recipe
    {
        $recipe = Recipe::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description']  ?? null,
            'preparation_time' => $validatedData['preparation_time'],
            'cooking_time' => $validatedData['cooking_time'],
            'ingredients' => $validatedData['ingredients'],
            'image_url' => $validatedData['image_url']  ?? null
           
        ]);

        return $recipe;
    }

    public function updateRecipe(array $validatedData, Recipe $recipe) : Recipe
    {
        $recipe->fill($validatedData);

        $recipe->save();

        return $recipe;
    }
}