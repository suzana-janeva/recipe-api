<?php

namespace App\Interfaces;

use App\Models\Recipe;

interface RecipeRepositoryInterface
{
    public function saveRecipe(array $validatedData): Recipe;

    public function updateRecipe(array $validatedData, Recipe $recipe): Recipe;
}