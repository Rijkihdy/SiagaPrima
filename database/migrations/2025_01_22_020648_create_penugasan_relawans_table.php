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
        Schema::create('penugasan_relawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('relawan_id')->constrained('relawans')->onDelete('cascade');
            $table->foreignId('bencana_id')->nullable()->constrained('bencanas')->onDelete('cascade');
            $table->foreignId('permintaan_p3k_id')->nullable()->constrained('permintaan_p3ks')->onDelete('cascade');
            $table->string('status_penugasan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_relawans');
    }
};