<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Relawan extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_relawan',
        'spesialisasi',
        'jabatan',
        'kontak',
        'status_relawan',
        'domisili',
        'email',
        'password',
        
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function penugasanRelawans()
    {
        return $this->hasMany(PenugasanRelawan::class);
    }
}