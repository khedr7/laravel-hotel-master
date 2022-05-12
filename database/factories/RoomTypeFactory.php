<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
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
            'price' => $this->faker->randomDigit(),
            'description->en' => $this->faker->sentence(),
            'description->ar' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
