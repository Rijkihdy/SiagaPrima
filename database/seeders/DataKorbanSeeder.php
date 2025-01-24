<?php

namespace Database\Seeders;

use App\Models\DataKorban;
use App\Models\Bencana;
use App\Models\PermintaanP3k;
use Illuminate\Database\Seeder;

class DataKorbanSeeder extends Seeder
{
    public function run(): void
    {
        $bencanas = Bencana::all();
        $permintaanP3ks = PermintaanP3k::all();

        $dataKorban = [
            [
                'nama_korban' => 'Budi Santoso',
                'bencana_id' => $bencanas->isNotEmpty() ? $bencanas->random()->id : null, // Ambil id random jika ada data
                'permintaan_p3k_id' => null,
                'alamat' => 'Jl. Pahlawan No. 10, Jakarta Selatan',
                'no_telp_korban' => '081212345678',
                'deskripsi' => 'Korban luka ringan akibat banjir.',
                'riwayat_penyakit' => 'Tidak ada',
                'umur' => 25,
                'jenis_kelamin' => 'laki-laki',
                'foto_korban' => null,
                'jumlah_korban' => 2,
                'rujukan' => 'Puskesmas terdekat',
            ],
            [
                'nama_korban' => 'Siti Aminah',
                'bencana_id' => null,
                'permintaan_p3k_id' => $permintaanP3ks->isNotEmpty() ? $permintaanP3ks->random()->id : null,
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
                'nama_korban' => 'Joko Widodo',
                'bencana_id' => $bencanas->isNotEmpty() ? $bencanas->random()->id : null,
                'permintaan_p3k_id' => null,
                'alamat' => 'Desa Sukamaju, Lombok Utara',
                'no_telp_korban' => '087711223344',
                'deskripsi' => 'Korban luka berat akibat gempa bumi.',
                'riwayat_penyakit' => 'Patah tulang kaki',
                'umur' => 45,
                'jenis_kelamin' => 'laki-laki',
                'foto_korban' => null,
                'jumlah_korban' => 3,
                'rujukan' => 'Posko Kesehatan',
            ],
            [
                'nama_korban' => 'Dewi Sartika',
                'bencana_id' => null,
                'permintaan_p3k_id' => $permintaanP3ks->isNotEmpty() ? $permintaanP3ks->random()->id : null,
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