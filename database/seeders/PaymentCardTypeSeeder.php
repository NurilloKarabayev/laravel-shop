<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCardType::create([
           'name' => 'humo',
            'code' => 'humocode',
            'icon' => 'humoicon',
        ]);
        PaymentCardType::create([
            'name' => 'uzcard',
            'code' => 'uzcardcode',
            'icon' => 'uzcardicon',
        ]);
        PaymentCardType::create([
            'name' => 'visa',
            'code' => 'visacode',
            'icon' => 'vosaicon',
        ]);
    }
}
