<?php

namespace Database\Seeders;

use App\Models\PermintaanP3k;
use Illuminate\Database\Seeder;

class PermintaanP3kSeeder extends Seeder
{
    public function run(): void
    {
        $permintaanP3ks = [
            [
                'user_id' => 1, // Ganti dengan user_id yang valid jika ada
                'kebutuhan_p3k' => 'Peralatan P3K untuk pertolongan pertama pada luka ringan.',
                'waktu_pengajuan' => '2024-07-26 09:00:00',
                'lokasi_kegiatan' => 'Lapangan Desa Sukamaju',
                'status_permintaan' => 'diproses',
                'kategori' => 'non-darurat',
                'detail_permintaan' => 'Membutuhkan kotak P3K standar dan perlengkapan pendukung.',
                'foto_p3k' => null,
            ],
            [
                'user_id' => 1,
                'kebutuhan_p3k' => 'Tim medis dan obat-obatan untuk penanganan korban bencana.',
                'waktu_pengajuan' => '2024-07-27 14:30:00',
                'lokasi_kegiatan' => 'Posko Bencana Banjir',
                'status_permintaan' => 'dialihkan',
                'kategori' => 'darurat',
                'detail_permintaan' => 'Prioritas penanganan luka berat dan evakuasi medis.',
                'foto_p3k' => null,
            ],
            [
                'user_id' => 1,
                'kebutuhan_p3k' => 'Penyediaan ambulans dan tenaga medis darurat.',
                'waktu_pengajuan' => '2024-07-28 10:00:00',
                'lokasi_kegiatan' => 'RSUD Kota Bandung',
                'status_permintaan' => 'selesai',
                'kategori' => 'darurat',
                'detail_permintaan' => 'Kebutuhan mendesak untuk penanganan pasien COVID-19.',
                'foto_p3k' => null,
            ],
            [
                'user_id' => 1,
                'kebutuhan_p3k' => 'Pelatihan P3K bagi relawan baru.',
                'waktu_pengajuan' => '2024-07-29 11:00:00',
                'lokasi_kegiatan' => 'Aula Kecamatan',
                'status_permintaan' => 'diproses',
                'kategori' => 'non-darurat',
                'detail_permintaan' => 'Materi pelatihan meliputi pertolongan pertama pada luka, patah tulang, dan CPR.',
                'foto_p3k' => null,
            ],
        ];

        foreach ($permintaanP3ks as $permintaanP3k) {
            PermintaanP3k::create($permintaanP3k);
        }
    }
}