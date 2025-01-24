<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('relawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Lebih ringkas dari 'nama_relawan'
            $table->string('email')->unique(); // Kolom email, wajib dan unique
            $table->string('password'); // Kolom password, wajib
            $table->string('spesialisasi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('kontak')->nullable(); // Ganti nama menjadi kontak
            $table->enum('status_relawan', ['aktif', 'tidak aktif'])->default('tidak aktif'); // Tambahkan default value
            $table->string('domisili')->nullable();
            $table->rememberToken(); // Untuk fitur "Remember Me"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relawans');
    }
};