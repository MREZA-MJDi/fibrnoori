<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('request_status_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fiber_request_id')
                ->constrained('fiber_requests')
                ->cascadeOnDelete();

            // Who changed the status
            $table->foreignId('changed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Status transition
            $table->string('from_status', 30)->nullable();
            $table->string('to_status', 30);

            // Optional explanation
            $table->text('note')->nullable();

            // Useful for audit trail
            $table->ipAddress('ip_address')->nullable();

            $table->timestamps();

            $table->index([
                'fiber_request_id',
                'created_at',
            ]);

            $table->index('to_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_status_histories');
    }
};
