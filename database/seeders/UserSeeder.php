<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // Panitia
        User::updateOrCreate(
            ['email' => 'panitia@example.com'],
            [
                'name' => 'Panitia 1',
                'password' => Hash::make('password'),
                'role' => 'panitia'
            ]
        );

        // Peserta (dummy user untuk test)
        User::updateOrCreate(
            ['email' => 'peserta@example.com'],
            [
                'name' => 'Peserta 1',
                'password' => Hash::make('password'),
                'role' => 'peserta'
            ]
        );
    }
}
