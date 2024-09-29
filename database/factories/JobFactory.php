<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        return [
            'category_id' => $category->id,        
            'user_id' => $user->id,        
            'title' => fake()->word(),        
            'type' => fake()->word(),        
            'description' => fake()->paragraph(),        
            'salary' => fake()->randomNumber(5),        
            'deadline' => now(),        
        ];
    }
}
