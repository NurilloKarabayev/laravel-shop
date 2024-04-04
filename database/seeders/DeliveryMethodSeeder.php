<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryMethod::create([
           "name" => [
               "uz" => "Tekin",
               "en" => "Free",
           ] ,
            "estimated_time" => [
                "uz" => "1 hafta",
                "en" => "1 week",
            ],
            "sum" => 0,
        ]);

        DeliveryMethod::create([
            "name" => [
                "uz" => "Standart",
                "en" => "Standart",
            ] ,
            "estimated_time" => [
                "uz" => "3 kun",
                "en" => "3 days",
            ],
            "sum" => 50000,
        ]);

        DeliveryMethod::create([
            "name" => [
                "uz" => "tezkoz",
                "en" => "fast",
            ] ,
            "estimated_time" => [
                "uz" => "1 kun",
                "en" => "1 day",
            ],
            "sum" => 100000,
        ]);
    }
}
