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

        // Contoh membuat beberapa user relawan (opsional) menggunakan factory
        User::factory(5)->create();

        // Contoh membuat user dengan data spesifik (opsional)
        User::create([
            'nama' => 'Relawan 1',
            'email' => 'relawan1@example.com',
            'no_hp' => '089876543210',
            'password' => Hash::make('relawan123'),
            'role' => 'masyarakat', // Contoh role: masyarakat
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'nama' => 'Relawan 2',
            'email' => 'relawan2@example.com',
            'no_hp' => '087777777777',
            'password' => Hash::make('relawan456'),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}