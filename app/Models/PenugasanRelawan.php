<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanRelawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'relawan_id',
        'bencana_id',
        'permintaan_p3k_id',
        'status_penugasan',
    ];

    public function relawan()
    {
        return $this->belongsTo(Relawan::class);
    }

    public function bencana()
    {
        return $this->belongsTo(Bencana::class);
    }

    public function permintaanP3k()
    {
        return $this->belongsTo(PermintaanP3k::class);
    }
}