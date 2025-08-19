<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // cek kalau sudah ada
            [
                'name' => 'Admin Utama',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), // ganti dengan password aman
                'role' => 'admin', // pastikan kolom role ada
            ]
        );
    }
}
