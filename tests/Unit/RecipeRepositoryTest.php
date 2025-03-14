<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Models\Recipe;
use App\Repositories\RecipeRepository;

class RecipeRepositoryTest extends TestCase
{
    public function test_it_can_save_a_recipe()
    {
        $data = [
            'name' => 'Test Recipe',
            'description' => 'This is a test recipe',
            'preparation_time' => '00:10',
            'cooking_time' => '00:20',
            'ingredients' => [
                ['ingredient' => 'Flour', 'quantity' => '200g'],
            ],
            'image_url' => 'https://example.com/test.jpg',
        ];

        $recipeRepositoryMock = Mockery::mock(RecipeRepository::class);

        $recipeRepositoryMock->shouldReceive('saveRecipe')
        ->once()
        ->with($data)
        ->andReturn(new Recipe($data));

        $result = $recipeRepositoryMock->saveRecipe($data);

        $this->assertInstanceOf(Recipe::class, $result);
        $this->assertEquals($data['name'], $result->name);
        $this->assertEquals($data['description'], $result->description);
    }
}