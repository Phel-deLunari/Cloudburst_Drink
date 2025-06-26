<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Drink;
use App\Models\Customer;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo user mẫu (cố định)
        User::factory()->create([
            'name' => 'Em Phel w Deadlines',
            'email' => 'ducnm.0405@gmail.com',
        ]);

        // Tạo bản ghi mẫu cho Drink (cố định)
        Drink::create([
            'name' => 'Coca-Cola',
            'type' => 'soda',
            'price' => 19.99,
        ]);

        // Tạo thêm 5 bản ghi Drink ngẫu nhiên (dùng factory)
        Drink::factory(5)->create();

        // Tạo bản ghi mẫu cho Customer (cố định)
        Customer::create([
            'name' => 'Nguyen Van A',
            'phone' => '0901234567',
            'address' => '123 Duong ABC, TP HCM',
        ]);

        // Tạo thêm 5 bản ghi Customer ngẫu nhiên
        Customer::factory(5)->create();

        // Tạo bản ghi mẫu cho Order (cố định)
        Order::create([
            'customer_id' => 1, // Giả sử Customer đầu tiên
            'drink_id' => 1, // Giả sử Drink đầu tiên
            'quantity' => 2,
            'total_price' => 39.98, // 2 * 19.99
        ]);

        // Tạo thêm 10 bản ghi Order ngẫu nhiên
        Order::factory(10)->create();

        User::where('email', 'ducnm.0405@gmail.com')->update(['role' => 'admin']);
    }

}