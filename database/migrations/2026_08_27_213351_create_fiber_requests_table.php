<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fiber_requests', function (Blueprint $table) {
            $table->id();

            // Customer
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Selected products
            $table->foreignId('tariff_id')
                ->constrained('tariffs')
                ->restrictOnDelete();

            $table->foreignId('modem_id')
                ->nullable()
                ->constrained('modems')
                ->nullOnDelete();

            // Request identification
            $table->string('tracking_code', 30)->unique();

            // Customer information snapshot
            $table->string('full_name', 150);
            $table->string('national_code', 10);
            $table->string('mobile', 20);

            // Address
            $table->string('province', 100);
            $table->string('city', 100);
            $table->text('address');
            $table->string('postal_code', 10);

            // Price snapshot
            $table->unsignedBigInteger('tariff_price');
            $table->unsignedBigInteger('modem_price')->default(0);
            $table->unsignedBigInteger('total_price');

            // Request status
            $table->string('status', 30)
                ->default('pending')
                ->index();

            // Internal/admin notes
            $table->text('admin_note')->nullable();

            // Customer note
            $table->text('customer_note')->nullable();

            // Completion / follow-up
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('national_code');
            $table->index('mobile');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fiber_requests');
    }
};
