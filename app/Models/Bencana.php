<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bencana',
        'lokasi_bencana',
        'waktu_kejadian',
        'deskripsi',
        'foto_bencana',
        'jumlah_korban',
        'status_bencana',
    ];

    public function dataKorbans()
    {
        return $this->hasMany(DataKorban::class);
    }

    public function penugasanRelawans()
    {
        return $this->hasMany(PenugasanRelawan::class);
    }
}