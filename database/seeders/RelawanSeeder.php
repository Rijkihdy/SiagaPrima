<?php

namespace Database\Seeders;

use App\Models\Relawan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash

class RelawanSeeder extends Seeder
{
    public function run(): void
    {
        $relawans = [
            [
                'nama' => 'Budi Santoso', 
                'email' => 'budi.santoso@example.com', 
                'password' => Hash::make('password'), 
                'spesialisasi' => 'Medis',
                'jabatan' => 'Dokter',
                'kontak' => '081234567890',
                'status_relawan' => 'aktif',
                'domisili' => 'Jakarta',
            ],
            [
                'nama' => 'Siti Aminah', 
                'email' => 'siti.aminah@example.com', 
                'password' => Hash::make('password'), 
                'spesialisasi' => 'Logistik',
                'jabatan' => 'Koordinator Logistik',
                'kontak' => '089876543210',
                'status_relawan' => 'aktif',
                'domisili' => 'Bandung',
            ],
            [
                'nama' => 'Rudi Hartono',
                'email' => 'rudi.hartono@example.com', 
                'password' => Hash::make('password'), 
                'spesialisasi' => 'Evakuasi',
                'jabatan' => 'Tim Evakuasi',
                'kontak' => '085712345678',
                'status_relawan' => 'tidak aktif',
                'domisili' => 'Surabaya',
            ],
            [
                'nama' => 'Dewi Lestari', 
                'email' => 'dewi.lestari@example.com',
                'password' => Hash::make('password'), 
                'spesialisasi' => 'Komunikasi',
                'jabatan' => 'Operator Radio',
                'kontak' => '087788990011',
                'status_relawan' => 'aktif',
                'domisili' => 'Medan',
            ],
            [
                'nama' => 'Agus Setiawan', 
                'email' => 'agus.setiawan@example.com',
                'password' => Hash::make('password'), 
                'spesialisasi' => 'Medis',
                'jabatan' => 'Perawat',
                'kontak' => '082233445566',
                'status_relawan' => 'aktif',
                'domisili' => 'Makassar',
            ],
        ];

        foreach ($relawans as $relawan) {
            Relawan::create($relawan);
        }
    }
}