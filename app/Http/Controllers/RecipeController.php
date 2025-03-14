<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\RecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Http\Requests\UpdateRecipeRequest;
use App\Interfaces\RecipeRepositoryInterface;

class RecipeController extends Controller
{
    protected $repo;

    public function __construct(RecipeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $recipes = Recipe::get();

        $data = RecipeResource::collection($recipes);

        return response()->json($data, 200);
    }

    public function store(RecipeRequest $request)
    {
        $validated = $request->validated(); 
        
        $recipe = $this->repo->saveRecipe($validated);

        $data = new RecipeResource($recipe);

        return response()->json($data, 201);
    }

    public function show(Recipe $recipe)
    {
        $data = new RecipeResource($recipe);

        return response()->json($data, 200);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $validated = $request->validated(); 

        $recipe = $this->repo->updateRecipe($validated, $recipe);

        $data = new RecipeResource($recipe);

        return response()->json($data, 200);
    }

}
