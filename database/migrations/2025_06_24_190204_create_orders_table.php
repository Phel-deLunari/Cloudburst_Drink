<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Khóa chính, tự động tăng
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới customers
            $table->foreignId('drink_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới drinks
            $table->integer('quantity'); // Số lượng nước ngọt
            $table->decimal('total_price', 8, 2); // Tổng tiền
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};