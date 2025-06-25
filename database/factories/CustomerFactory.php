<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = \App\Models\Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Tên ngẫu nhiên: "Nguyen Van B"
            'phone' => $this->faker->unique()->phoneNumber(), // Số điện thoại duy nhất
            'address' => $this->faker->address(), // Địa chỉ: "456 Duong XYZ, TP HCM"
        ];
    }
}