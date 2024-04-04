<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAddress::create([
            "user_id" => 2,
            "latitude" => "46541 6516513 ",
            "longtitude" => "65+6284651235",
            "region" => "Andijan",
            "district" => "Shakhrixan",
            "street" => "Nayman",
            "home" => "90"
        ]);
    }
}
