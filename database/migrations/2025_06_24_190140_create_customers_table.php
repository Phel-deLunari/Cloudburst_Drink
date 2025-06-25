<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Khóa chính, tự động tăng
            $table->string('name'); // Tên khách hàng
            $table->string('phone')->unique(); // Số điện thoại, duy nhất
            $table->string('address')->nullable(); // Dchi, tùy chọn
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};