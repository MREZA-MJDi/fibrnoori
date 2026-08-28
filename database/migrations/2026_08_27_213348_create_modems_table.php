<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modems', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->string('slug', 180)->unique();

            $table->text('description')->nullable();

            $table->unsignedBigInteger('price');

            $table->unsignedInteger('stock')->default(0);

            $table->json('features')->nullable();

            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modems');
    }
};
