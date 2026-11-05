<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')
                  ->constrained('customers')
                  ->restrictOnDelete();

            $table->foreignId('service_id')
                  ->constrained('services')
                  ->restrictOnDelete();

            $table->date('booking_date');
            $table->time('booking_time');
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('total_price', 12, 0);
            $table->string('status')->default('pending');
            $table->text('note')->nullable();

            $table->timestamps();

            $table->index(['booking_date', 'booking_time']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};