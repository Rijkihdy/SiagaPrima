<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_relawan',
        'spesialisasi',
        'jabatan',
        'kontak',
        'status_relawan',
        'domisili'
    ];

    public function penugasanRelawans()
    {
        return $this->hasMany(PenugasanRelawan::class);
    }
}