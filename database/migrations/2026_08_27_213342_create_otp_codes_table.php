<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_codes', function (Blueprint $table) {
            $table->id();

            $table->string('mobile', 20)->index();

            $table->string('code', 10);

            $table->timestamp('expires_at')->index();

            $table->timestamp('verified_at')->nullable();

            $table->unsignedTinyInteger('attempts')->default(0);

            $table->ipAddress('request_ip')->nullable();

            $table->timestamps();

            $table->index(['mobile', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_codes');
    }
};
