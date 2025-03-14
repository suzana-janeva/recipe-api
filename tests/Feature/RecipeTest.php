<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecipeTest extends TestCase
{
    public function test_it_can_create_a_recipe()
    {
        $data = [
            'name' => 'Test Recipe',
            'description' => 'This is a test recipe',
            'preparation_time' => '01:10',
            'cooking_time' => '00:20',
            'ingredients' => [
                ['ingredient' => 'Flour', 'quantity' => '200g'],
                ['ingredient' => 'Eggs', 'quantity' => '2'],
                ['ingredient' => 'Parmesan', 'quantity' => '50g'],
            ],
            'image_url' => 'https://example.com/recipe.jpg',
        ];

        $response = $this->postJson('/api/recipe', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Test Recipe']);
        
        $this->assertDatabaseHas('recipes', ['name' => 'Test Recipe']);
    }

    public function test_ingredients_must_have_both_ingredient_and_quantity_if_provided()
    {
        $data = [
            'name' => 'Test Recipe',
            'description' => 'This is a test recipe',
            'preparation_time' => '00:10',
            'cooking_time' => '02:20',
            'ingredients' => [
                ['ingredient' => 'Flour'], // Missing quantity
            ],
            'image_url' => 'https://example.com/recipe.jpg',
        ];
    
        $response = $this->postJson('/api/recipe', $data);
    
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['ingredients.0.quantity']);
    
        $data['ingredients'] = [['quantity' => '100g']]; // Missing ingredient
    
        $response = $this->postJson('/api/recipe', $data);
    
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['ingredients.0.ingredient']);
    }
}
