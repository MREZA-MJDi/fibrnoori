<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'mobile' => '09128831544',
            ],
            [
                'name' => 'مدیر سیستم',
                'mobile_verified_at' => now(),
                'password' => null,
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            [
                'mobile' => '09120000002',
            ],
            [
                'name' => 'کاربر تست',
                'mobile_verified_at' => now(),
                'password' => null,
                'role' => 'customer',
            ]
        );
    }
}
