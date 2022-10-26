<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'user_id' => 1,
            'quantity' => $this->faker->numberBetween(1, 1000),
            'price' => $this->faker->randomFloat(2, 1.0, 1000.0),
            'created_at' => Carbon::now()
        ];
    }
}
