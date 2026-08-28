<?php

namespace Database\Seeders;

use App\Models\OtpCode;
use Illuminate\Database\Seeder;

class OtpCodeSeeder extends Seeder
{
    public function run(): void
    {
        OtpCode::updateOrCreate(
            [
                'mobile' => '09120000002',
            ],
            [
                'code' => '123456',
                'expires_at' => now()->addHours(24),
                'attempts' => 0,
                'verified_at' => null,
                'request_ip' => '127.0.0.1',
            ]
        );
    }
}
