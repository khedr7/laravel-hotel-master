<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'job_title' => $this->faker->name(),
            'customer_id' => $this->faker->randomElement([1, 2, 3]),
            'rate' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'message' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
