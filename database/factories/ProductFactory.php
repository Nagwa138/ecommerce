<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'desc' => $this->faker->sentence,
            'quantity' => $this->faker->numerify,
            'price' => $this->faker->numerify,
            'image' => $this->faker->imageUrl,
            'user_id' => User::first()->id
        ];
    }
}
