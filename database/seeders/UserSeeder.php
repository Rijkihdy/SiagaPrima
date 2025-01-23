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
        // Akun admin
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'pmi',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Akun tambahan
        User::create([
            'nama' => 'user1',
            'email' => 'user1@gmail.com',
            'no_hp' => '081234567891',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'nama' => 'user2',
            'email' => 'user2@gmail.com',
            'no_hp' => '081234567892',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'nama' => 'user3',
            'email' => 'user3@gmail.com',
            'no_hp' => '081234567893',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'nama' => 'user4',
            'email' => 'user4@gmail.com',
            'no_hp' => '081234567894',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
