<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DrinkFactory extends Factory
{
    protected $model = \App\Models\Drink::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Ví dụ: "Pepsi", "Sprite"
            'type' => $this->faker->randomElement(['soda', 'juice', 'tea']),
            'price' => $this->faker->randomFloat(2, 10, 50), // Giá từ 10.00 đến 50.00
        ];
    }
}