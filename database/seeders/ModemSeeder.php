<?php

namespace Database\Seeders;

use App\Models\Modem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ModemSeeder extends Seeder
{
    public function run(): void
    {
        $modems = [
            [
                'name' => 'مودم فیبر اقتصادی',
                'price' => 850000,
                'stock' => 20,
                'description' => 'مودم مناسب برای استفاده معمولی و اتصال پایدار به شبکه فیبر نوری.',
                'features' => [
                    'مناسب فیبر نوری',
                    'اتصال پایدار',
                    'نصب آسان',
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'مودم فیبر حرفه‌ای',
                'price' => 1450000,
                'stock' => 15,
                'description' => 'مودم قدرتمند برای خانه‌های پرمصرف و استفاده همزمان چند دستگاه.',
                'features' => [
                    'سرعت بالا',
                    'مناسب چند دستگاه',
                    'پایداری بالا',
                    'مناسب استریم و بازی',
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'مودم فیبر پریمیوم',
                'price' => 2200000,
                'stock' => 8,
                'description' => 'مدل حرفه‌ای برای کاربران با مصرف بالا و شبکه خانگی پیشرفته.',
                'features' => [
                    'عملکرد حرفه‌ای',
                    'مناسب مصرف سنگین',
                    'پوشش مناسب',
                    'اتصال پایدار',
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($modems as $modem) {
            Modem::updateOrCreate(
                [
                    'slug' => Str::slug($modem['name']),
                ],
                $modem
            );
        }
    }
}
