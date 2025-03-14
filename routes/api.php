<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('recipes', [RecipeController::class, 'index']);
Route::post('recipe', [RecipeController::class, 'store']);
Route::get('recipe/{recipe}', [RecipeController::class, 'show']);
Route::put('recipe/{recipe}', [RecipeController::class, 'update']);