<?php

namespace Database\Seeders;

use App\Models\Bencana;
use Illuminate\Database\Seeder;

class BencanaSeeder extends Seeder
{
    public function run(): void
    {
        $bencanas = [
            [
                'nama_bencana' => 'Banjir Bandang Sungai Ciliwung',
                'lokasi_bencana' => 'Jakarta Selatan',
                'waktu_kejadian' => '2024-01-15 08:00:00', 
                'deskripsi' => 'Banjir bandang akibat curah hujan tinggi di wilayah Bogor dan sekitarnya.',
                'foto_bencana' => null, 
                'jumlah_korban' => 500,
                'status_bencana' => 'berlangsung',
            ],
            [
                'nama_bencana' => 'Gempa Bumi Lombok',
                'lokasi_bencana' => 'Lombok Utara',
                'waktu_kejadian' => '2023-08-05 12:00:00',
                'deskripsi' => 'Gempa bumi berkekuatan 7.0 SR mengguncang Lombok.',
                'foto_bencana' => null,
                'jumlah_korban' => 1000,
                'status_bencana' => 'selesai',
            ],
            [
                'nama_bencana' => 'Kebakaran Hutan Kalimantan',
                'lokasi_bencana' => 'Kalimantan Tengah',
                'waktu_kejadian' => '2023-09-20 10:00:00',
                'deskripsi' => 'Kebakaran hutan dan lahan yang menyebabkan kabut asap parah.',
                'foto_bencana' => null,
                'jumlah_korban' => 0,
                'status_bencana' => 'selesai',
            ],
            [
                'nama_bencana' => 'Tanah Longsor Sukabumi',
                'lokasi_bencana' => 'Sukabumi',
                'waktu_kejadian' => '2024-02-10 15:00:00',
                'deskripsi' => 'Tanah longsor akibat hujan deras yang melanda wilayah Sukabumi.',
                'foto_bencana' => null,
                'jumlah_korban' => 200,
                'status_bencana' => 'berlangsung',
            ],
            [
                'nama_bencana' => 'Erupsi Gunung Merapi',
                'lokasi_bencana' => 'Yogyakarta',
                'waktu_kejadian' => '2024-03-01 05:00:00',
                'deskripsi' => 'Gunung Merapi mengalami erupsi dan mengeluarkan awan panas.',
                'foto_bencana' => null,
                'jumlah_korban' => 50,
                'status_bencana' => 'berlangsung',
            ],
        ];

        foreach ($bencanas as $bencana) {
            Bencana::create($bencana);
        }
    }
}