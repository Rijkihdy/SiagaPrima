<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    // Mutator untuk waktu_kejadian
    public function getWaktuKejadianAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}