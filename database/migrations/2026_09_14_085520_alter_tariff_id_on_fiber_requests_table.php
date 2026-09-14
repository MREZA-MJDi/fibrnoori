<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiber_requests', function (Blueprint $table) {
            $table->dropForeign(['tariff_id']);

            $table->foreignId('tariff_id')
                ->nullable()
                ->change();

            $table->foreign('tariff_id')
                ->references('id')
                ->on('tariffs')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('fiber_requests', function (Blueprint $table) {
            $table->dropForeign(['tariff_id']);

            $table->foreignId('tariff_id')
                ->nullable(false)
                ->change();

            $table->foreign('tariff_id')
                ->references('id')
                ->on('tariffs')
                ->restrictOnDelete();
        });
    }
};
