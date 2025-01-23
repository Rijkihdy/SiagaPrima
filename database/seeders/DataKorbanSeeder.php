<?php

namespace Database\Seeders;

use App\Models\DataKorban; // Import model DataKorban
use Illuminate\Database\Seeder;

class DataKorbanSeeder extends Seeder
{
    public function run(): void
    {
        $dataKorban = [
            [
                'bencana_id' => 1, // Ganti dengan ID bencana yang valid
                'permintaan_p3k_id' => null, // Bisa null jika terkait bencana langsung
                'alamat' => 'Jl. Pahlawan No. 10, Jakarta Selatan',
                'no_telp_korban' => '081212345678',
                'deskripsi' => 'Korban luka ringan akibat banjir.',
                'riwayat_penyakit' => 'Tidak ada',
                'umur' => 25,
                'jenis_kelamin' => 'laki-laki',
                'foto_korban' => null,
                'jumlah_korban' => 1, // Jumlah korban dalam data ini
                'rujukan' => 'Puskesmas terdekat',
            ],
            [
                'bencana_id' => null, // Bisa null jika terkait permintaan P3K
                'permintaan_p3k_id' => 1, // Ganti dengan ID permintaan P3K yang valid
                'alamat' => 'Jl. Merdeka No. 5, Bandung',
                'no_telp_korban' => '085678901234',
                'deskripsi' => 'Korban pingsan saat pertandingan sepak bola.',
                'riwayat_penyakit' => 'Asma',
                'umur' => 17,
                'jenis_kelamin' => 'perempuan',
                'foto_korban' => null,
                'jumlah_korban' => 1,
                'rujukan' => 'Rumah Sakit Umum',
            ],
            [
                'bencana_id' => 2,
                'permintaan_p3k_id' => null,
                'alamat' => 'Desa Sukamaju, Lombok Utara',
                'no_telp_korban' => '087711223344',
                'deskripsi' => 'Korban luka berat akibat gempa bumi.',
                'riwayat_penyakit' => 'Patah tulang kaki',
                'umur' => 45,
                'jenis_kelamin' => 'laki-laki',
                'foto_korban' => null,
                'jumlah_korban' => 1,
                'rujukan' => 'Posko Kesehatan',
            ],
             [
                'bencana_id' => null,
                'permintaan_p3k_id' => 2,
                'alamat' => 'Jl. Sudirman No. 20, Jakarta Pusat',
                'no_telp_korban' => '082299887766',
                'deskripsi' => 'Korban luka bakar ringan akibat kecelakaan kecil.',
                'riwayat_penyakit' => 'Alergi obat',
                'umur' => 32,
                'jenis_kelamin' => 'perempuan',
                'foto_korban' => null,
                'jumlah_korban' => 1,
                'rujukan' => 'Klinik terdekat',
            ],
        ];

        foreach ($dataKorban as $korban) {
            DataKorban::create($korban);
        }
    }
}