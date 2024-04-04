<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attribute = Attribute::find(1);

        $attribute->values()->create([
            "name" => [
                "uz" => "qizil",
                "en" => "red",
            ]
        ]);
        $attribute->values()->create([
            "name" => [
                "uz" => "sariq",
                "en" => "yellow",
            ]
        ]);
        $attribute->values()->create([
            "name" => [
                "uz" => "qora",
                "en" => "black",
            ]
        ]);

        $attribute = Attribute::find(2);


        $attribute->values()->create([
            "name" => [
                "uz" => "MDF",
                "en" => "MDF",
            ]
        ]);
        $attribute->values()->create([
            "name" => [
                "uz" => "DSP",
                "en" => "DSP",
            ]
        ]);

        $attribute = Attribute::find(3);

        $attribute->values()->create([
            "name" => [
                "uz" => "m",
                "en" => "m",
            ]
        ]);
        $attribute->values()->create([
            "name" => [
                "uz" => "s",
                "en" => "s",
            ]
        ]);

    }
}
