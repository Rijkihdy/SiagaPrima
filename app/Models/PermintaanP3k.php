<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanP3k extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kebutuhan_p3k',
        'waktu_pengajuan',
        'lokasi_kegiatan',
        'status_permintaan',
        'kategori',
        'detail_permintaan',
        'foto_p3k',
    ];

    protected $casts = [
        'waktu_pengajuan' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penugasanRelawans()
    {
        return $this->hasMany(PenugasanRelawan::class);
    }
    public function dataKorbans()
    {
        return $this->hasMany(DataKorban::class);
    }
}