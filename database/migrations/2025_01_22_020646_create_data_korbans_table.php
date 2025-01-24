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
        Schema::create('data_korbans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_korban')->nullable();
            $table->foreignId('bencana_id')->nullable()->constrained('bencanas')->onDelete('cascade');
            $table->foreignId('permintaan_p3k_id')->nullable()->constrained('permintaan_p3ks')->onDelete('cascade');
            $table->text('alamat')->nullable();
            $table->string('no_telp_korban')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->integer('umur')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('foto_korban')->nullable();
            $table->integer('jumlah_korban');
            $table->text('rujukan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_korbans');
    }
};
