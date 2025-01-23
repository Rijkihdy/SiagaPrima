<?php

namespace Database\Seeders;

use App\Models\KontakDarurat;
use Illuminate\Database\Seeder;

class KontakDaruratSeeder extends Seeder
{
    public function run(): void
    {
        $kontakDarurats = [
            [
                'nama_kontak' => 'pmi',
                'no_kontak' => '117',
                'alamat' => 'Markas Pusat PMI, Jakarta',
            ],
            [
                'nama_kontak' => 'rumah_sakit',
                'no_kontak' => '118',
                'alamat' => 'RSUD Dr. Soetomo, Surabaya',
            ],
            [
                'nama_kontak' => 'polisi',
                'no_kontak' => '110',
                'alamat' => 'Mabes Polri, Jakarta',
            ],
            [
                'nama_kontak' => 'pemadam',
                'no_kontak' => '113',
                'alamat' => 'Dinas Pemadam Kebakaran, Jakarta',
            ],
             [
                'nama_kontak' => 'bpbd',
                'no_kontak' => '112',
                'alamat' => 'Badan Penanggulangan Bencana Daerah (BPBD) DKI Jakarta',
            ],
        ];

        foreach ($kontakDarurats as $kontakDarurat) {
            KontakDarurat::create($kontakDarurat);
        }
    }
}