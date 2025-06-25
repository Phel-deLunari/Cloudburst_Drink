<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng, khóa chính
            $table->string('name'); // Tên nước ngọt
            $table->string('type')->nullable(); // Loại nước ngọt (ví dụ: soda, juice)
            $table->decimal('price', 8, 2); // Giá (8 chữ số, 2 chữ số thập phân)
            $table->timestamps(); // Cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks'); // Xóa bảng drinks khi rollback
    }
};