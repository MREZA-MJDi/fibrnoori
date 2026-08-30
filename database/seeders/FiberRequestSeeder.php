<?php

namespace Database\Seeders;

use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Database\Seeder;

class FiberRequestSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('role', 'customer')
            ->firstOrFail();

        $tariffs = Tariff::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $modems = Modem::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        if ($tariffs->isEmpty()) {
            return;
        }

        $statuses = [
            'pending',
            'reviewing',
            'approved',
            'completed',
            'rejected',
        ];

        foreach ($statuses as $index => $status) {
            $tariff = $tariffs[$index % $tariffs->count()];

            $modem = $modems->isNotEmpty()
                ? $modems[$index % $modems->count()]
                : null;

            $modemPrice = (int) ($modem?->price ?? 0);

            $createdAt = now()->subDays(5 - $index);

            $data = [
                'user_id' => $customer->id,

                'tariff_id' => $tariff->id,

                'modem_id' => $modem?->id,

                'tracking_code' => 'FBR-' . now()->format('Ymd') . '-' . str_pad(
                    (string) ($index + 1),
                    4,
                    '0',
                    STR_PAD_LEFT
                ),

                // Customer identity
                'full_name' => $customer->name ?? 'کاربر تست',

                'father_name' => match ($index) {
                    0 => 'محمد',
                    1 => 'علی',
                    2 => 'حسن',
                    3 => 'رضا',
                    default => 'محمود',
                },

                'national_code' => '001234567' . ($index + 1),

                'birth_certificate_number' => (string) (1234 + $index),

                'birth_date' => match ($index) {
                    0 => '1375/02/15',
                    1 => '1378/07/21',
                    2 => '1372/11/08',
                    3 => '1369/04/17',
                    default => '1380/01/12',
                },

                // Contact
                'mobile' => $customer->mobile,

                'landline' => match ($index) {
                    0 => '02112345678',
                    1 => '02122334455',
                    2 => null,
                    3 => '02133445566',
                    default => '02144556677',
                },

                // Address
                'province' => 'تهران',

                'city' => 'تهران',

                'address' => 'تهران، خیابان نمونه، کوچه تست، پلاک ' . ($index + 10),

                'postal_code' => '123456789' . ($index + 1),

                // Price snapshot
                'tariff_price' => (int) $tariff->price,

                'modem_price' => $modemPrice,

                'total_price' => (int) $tariff->price + $modemPrice,

                // Status
                'status' => $status,

                // Notes
                'admin_note' => match ($status) {
                    'reviewing' => 'درخواست در حال بررسی توسط واحد پشتیبانی است.',
                    'approved' => 'درخواست مورد تأیید قرار گرفت.',
                    'completed' => 'درخواست با موفقیت تکمیل شد.',
                    'rejected' => 'درخواست به دلیل اطلاعات ناقص رد شد.',
                    default => null,
                },

                'customer_note' => match ($status) {
                    'pending' => 'لطفاً در اولین فرصت بررسی شود.',
                    'completed' => 'ممنون از پیگیری شما.',
                    default => null,
                },

                'reviewed_at' => in_array(
                    $status,
                    ['reviewing', 'approved', 'completed', 'rejected'],
                    true
                )
                    ? $createdAt->copy()->addHours(8)
                    : null,

                'completed_at' => $status === 'completed'
                    ? $createdAt->copy()->addDays(2)
                    : null,

                'created_at' => $createdAt,

                'updated_at' => $createdAt,
            ];

            FiberRequest::updateOrCreate(
                [
                    'tracking_code' => $data['tracking_code'],
                ],
                $data
            );
        }
    }
}