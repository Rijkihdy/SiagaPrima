<?php

namespace Database\Seeders;

use App\Models\Bencana;
use App\Models\PenugasanRelawan;
use App\Models\PermintaanP3k;
use App\Models\Relawan;
use Illuminate\Database\Seeder;

class PenugasanRelawanSeeder extends Seeder
{
    public function run(): void
    {
        $relawans = Relawan::all();
        $bencanas = Bencana::all();
        $permintaanP3ks = PermintaanP3k::all();

        if ($relawans->isEmpty() || ($bencanas->isEmpty() && $permintaanP3ks->isEmpty())) {
            $this->command->info('Tidak ada data relawan, bencana, atau permintaan P3K. Seeder Penugasan Relawan dilewati.');
            return; // Hentikan seeder jika tidak ada data yang dibutuhkan
        }

        foreach ($relawans as $relawan) {
            // Logika untuk menentukan apakah relawan ditugaskan ke bencana atau permintaan P3K
            if ($bencanas->isNotEmpty() && (rand(0, 1) || $permintaanP3ks->isEmpty())) { // Prioritaskan bencana jika ada
                $bencana = $bencanas->random();
                PenugasanRelawan::create([
                    'relawan_id' => $relawan->id,
                    'bencana_id' => $bencana->id,
                    'permintaan_p3k_id' => null,
                    'status_penugasan' => $this->getRandomStatus(),
                ]);
            } elseif ($permintaanP3ks->isNotEmpty()) { // Jika tidak ada bencana atau dipilih permintaan P3K
                $permintaanP3k = $permintaanP3ks->random();
                PenugasanRelawan::create([
                    'relawan_id' => $relawan->id,
                    'bencana_id' => null,
                    'permintaan_p3k_id' => $permintaanP3k->id,
                    'status_penugasan' => $this->getRandomStatus(),
                ]);
            }
        }
    }

    private function getRandomStatus() {
        $status = ['ditugaskan', 'selesai', 'batal'];
        return $status[array_rand($status)];
    }
}