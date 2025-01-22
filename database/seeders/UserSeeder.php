<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun admin
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890', // Contoh nomor HP
            'password' => Hash::make('password'),
            'role' => 'pmi', // Contoh role: pmi (Palang Merah Indonesia)
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}