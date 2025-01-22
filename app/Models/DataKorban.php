<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKorban extends Model
{
    use HasFactory;

    protected $fillable = [
        'bencana_id',
        'nama_korban',
        'alamat',
        'no_telp_korban',
        'deskripsi',
        'riwayat_penyakit',
        'umur',
        'jenis_kelamin',
        'foto_korban',
        'rujukan'
    ];

    public function bencana()
    {
        return $this->belongsTo(Bencana::class);
    }
}