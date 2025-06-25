<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Drink;

class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition(): array
    {
        $drink = Drink::factory()->create(); // Tạo Drink trước
        $quantity = $this->faker->numberBetween(1, 10); // Số lượng 1-10

        return [
            'customer_id' => Customer::factory(), // Tạo Customer tự động
            'drink_id' => $drink->id, // Lấy ID của Drink
            'quantity' => $quantity,
            'total_price' => $quantity * $drink->price, // Tính tổng giá
        ];
    }
}