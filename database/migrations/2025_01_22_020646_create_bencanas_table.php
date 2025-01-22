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
        Schema::create('bencanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bencana');
            $table->text('lokasi_bencana');
            $table->dateTime('waktu_kejadian');
            $table->text('deskripsi')->nullable();
            $table->string('foto_bencana')->nullable();
            $table->integer('jumlah_korban')->nullable();
            $table->enum('status_bencana', ['selesai', 'berlangsung']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bencanas');
    }
};
