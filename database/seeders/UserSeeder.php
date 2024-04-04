<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $user = User::create([
        'first_name' => 'admin',
        'last_name' => 'addmin',
        'email' => 'admin@gmail.com',
        'phone' => '+99999999999',
        'password' => Hash::make('12345'),
     ])  ;
     $user->assignRole('admin');

        $userexp = User::create([
            'first_name' => 'Nurullo',
            'last_name' => 'Karabayev',
            'email' => 'Nurullo@gmail.com',
            'phone' => '+99999999998',
            'password' => Hash::make('nurullo'),
        ])  ;
        $userexp->assignRole('customer');

        $userCurier = User::create([
            'first_name' => 'Elyor',
            'last_name' => 'Jorayev',
            'email' => 'Elyor@gmail.com',
            'phone' => '+99999999997',
            'password' => Hash::make('elyor'),
        ])  ;
        $userCurier->assignRole('curier');

        $userManager = User::create([
            'first_name' => 'Zokir',
            'last_name' => 'Zokirov',
            'email' => 'Manager@gmail.com',
            'phone' => '+99999999996',
            'password' => Hash::make('123456'),
        ])  ;
        $userManager->assignRole('shop-manager');

        $users = User::factory()->count(10)->create();
             foreach ($users as $user){
         $user->assignRole('customer');
     }


    }
}
