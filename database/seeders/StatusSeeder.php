<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
           'name' => [
               "uz" => " yangi",
               "en" => "new"
           ] ,
            'code' => 'new',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tasdiqlandi",
                "en" => "confirmed"
            ] ,
            'code' => 'confirmed',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tayyorlanmoqda",
                "en" => "getting ready"
            ] ,
            'code' => 'processing',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "yetkazilmoqda",
                "en" => "on the way"
            ] ,
            'code' => 'shipping',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "yetkazib berildi",
                "en" => "delivered"
            ] ,
            'code' => 'shipped',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tolov kutilmoqda",
                "en" => "waiting for payment"
            ] ,
            'code' => 'waiting_payment',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tugatildi",
                "en" => "complited"
            ] ,
            'code' => 'complited',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "yopildi",
                "en" => "closed"
            ] ,
            'code' => 'closed',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tolovda hatolik",
                "en" => "payment error"
            ] ,
            'code' => 'payment_error',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "tolandi",
                "en" => "paid"
            ] ,
            'code' => 'paid',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "bekor qlindi",
                "en" => "canceled"
            ] ,
            'code' => 'canceled',
            'for' => 'order',
        ]);
        Status::create([
            'name' => [
                "uz" => "qaytarib berildi",
                "en" => "refounded"
            ] ,
            'code' => 'refounded',
            'for' => 'order',
        ]);
    }
}
