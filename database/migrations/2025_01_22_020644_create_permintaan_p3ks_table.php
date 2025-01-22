<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_p3ks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke users, onDelete cascade
            $table->text('kebutuhan_p3k');
            $table->dateTime('waktu_pengajuan');
            $table->text('lokasi_kegiatan');
            $table->enum('status_permintaan', ['diproses', 'dialihkan', 'selesai']);
            $table->enum('kategori', ['darurat', 'non-darurat']);
            $table->text('detail_permintaan')->nullable();
            $table->string('foto_p3k')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_p3ks');
    }
};
