<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakDarurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kontak',
        'no_kontak',
        'alamat'
    ];
}