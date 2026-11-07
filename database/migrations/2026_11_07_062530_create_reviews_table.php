<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // Liên kết với lịch hẹn
            $table->foreignId('booking_id')
                  ->unique()
                  ->constrained('bookings')
                  ->restrictOnDelete();

            // Số sao đánh giá từ 1 đến 5
            $table->unsignedTinyInteger('rating');

            // Nội dung nhận xét
            $table->text('comment')->nullable();

            // Trạng thái kiểm duyệt
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};