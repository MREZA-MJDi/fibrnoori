<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TariffSeeder extends Seeder
{
    public function run(): void
    {
        $tariffs = [
            [
                'name' => 'اقتصادی',
                'speed_mbps' => 50,
                'price' => 250000,
                'duration_days' => 30,
                'description' => 'مناسب برای استفاده روزمره، وب‌گردی و شبکه‌های اجتماعی.',
                'features' => [
                    'سرعت 50 مگابیت',
                    'مناسب استفاده روزمره',
                    'پشتیبانی',
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'پیشنهادی',
                'speed_mbps' => 100,
                'price' => 400000,
                'duration_days' => 30,
                'description' => 'انتخاب مناسب برای خانواده، استریم و استفاده همزمان چند دستگاه.',
                'features' => [
                    'سرعت 100 مگابیت',
                    'مناسب استریم',
                    'مناسب چند دستگاه',
                    'پشتیبانی',
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'حرفه‌ای',
                'speed_mbps' => 300,
                'price' => 750000,
                'duration_days' => 30,
                'description' => 'برای کاربران حرفه‌ای، بازی آنلاین، دانلود و مصرف سنگین.',
                'features' => [
                    'سرعت 300 مگابیت',
                    'مناسب بازی آنلاین',
                    'مناسب دانلود سنگین',
                    'مناسب کاربران حرفه‌ای',
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'پریمیوم',
                'speed_mbps' => 500,
                'price' => 1100000,
                'duration_days' => 30,
                'description' => 'بالاترین سرعت برای استفاده حرفه‌ای و چندکاربره.',
                'features' => [
                    'سرعت 500 مگابیت',
                    'مناسب مصرف سنگین',
                    'مناسب چند کاربر',
                    'پشتیبانی ویژه',
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($tariffs as $tariff) {
            Tariff::updateOrCreate(
                [
                    'slug' => Str::slug($tariff['name']),
                ],
                $tariff
            );
        }
    }
}
