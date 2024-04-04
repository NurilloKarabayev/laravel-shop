<?php

namespace Database\Seeders;

use App\Enums\SettingType;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
           'name' => [
               "uz" => "Til",
               "en" => "Language"
           ] ,
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                "uz" => "O'zbekcha",
                "en" => "Uzbek"
            ]
        ]);

        $setting->values()->create([
            'name' => [
                "uz" => "Inglizcha",
                "en" => "English"
            ]
        ]);

        /*  Pul Birligi */

        $setting = Setting::create([
            'name' => [
                "uz" => "Pul birligi",
                "en" => "Currency sybol"
            ] ,
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                "uz" => "so'm",
                "en" => "sum"
            ]
        ]);

        $setting->values()->create([
            'name' => [
                "uz" => "Dollor",
                "en" => "Dollor"
            ]
        ]);

        /* dark mode yoqish*/
        $setting = Setting::create([
            'name' => [
                "uz" => "Qorongu rejim",
                "en" => "Dark mode"
            ] ,
            'type' => SettingType::SWITCH->value,
        ]);

        /* habarnomalar*/


        $setting = Setting::create([
            'name' => [
                "uz" => "Habarnomalar",
                "en" => "Notification"
            ] ,
            'type' => SettingType::SWITCH->value,
        ]);
    }
}
