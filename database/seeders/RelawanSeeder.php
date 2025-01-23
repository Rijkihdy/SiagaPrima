<?php

namespace Database\Seeders;

use App\Models\Relawan;
use Illuminate\Database\Seeder;

class RelawanSeeder extends Seeder
{
    public function run(): void
    {
        $relawans = [
            [
                'nama_relawan' => 'Budi Santoso',
                'spesialisasi' => 'Medis',
                'jabatan' => 'Dokter',
                'kontak' => '081234567890',
                'status_relawan' => 'aktif',
                'domisili' => 'Jakarta',
            ],
            [
                'nama_relawan' => 'Siti Aminah',
                'spesialisasi' => 'Logistik',
                'jabatan' => 'Koordinator Logistik',
                'kontak' => '089876543210',
                'status_relawan' => 'aktif',
                'domisili' => 'Bandung',
            ],
            [
                'nama_relawan' => 'Rudi Hartono',
                'spesialisasi' => 'Evakuasi',
                'jabatan' => 'Tim Evakuasi',
                'kontak' => '085712345678',
                'status_relawan' => 'tidak aktif',
                'domisili' => 'Surabaya',
            ],
            [
                'nama_relawan' => 'Dewi Lestari',
                'spesialisasi' => 'Komunikasi',
                'jabatan' => 'Operator Radio',
                'kontak' => '087788990011',
                'status_relawan' => 'aktif',
                'domisili' => 'Medan',
            ],
            [
                'nama_relawan' => 'Agus Setiawan',
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