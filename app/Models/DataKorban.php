<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKorban extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_korban', 'bencana_id', 'permintaan_p3k_id', 'alamat', 'no_telp_korban', 'deskripsi',
        'riwayat_penyakit', 'umur', 'jenis_kelamin', 'foto_korban', 'jumlah_korban', 'rujukan'
    ];

    public function bencana()
    {
        return $this->belongsTo(Bencana::class);
    }
    public function permintaanP3k()
    {
        return $this->belongsTo(PermintaanP3k::class);
    }
}