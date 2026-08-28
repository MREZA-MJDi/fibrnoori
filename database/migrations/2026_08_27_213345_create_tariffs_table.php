<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->string('slug', 180)->unique();

            $table->unsignedInteger('speed_mbps');

            $table->unsignedBigInteger('price');

            $table->unsignedSmallInteger('duration_days');

            $table->text('description')->nullable();

            $table->json('features')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tariffs');
    }
};
