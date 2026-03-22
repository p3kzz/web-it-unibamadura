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
        Schema::create('penugasan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')
                ->constrained('pegawai')
                ->cascadeOnDelete();
            $table->foreignId('unit_organisasi_id')
                ->constrained('unit_organisasi')
                ->cascadeOnDelete();
            $table->boolean('is_primary')->default(true);
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();

            $table->unique(['pegawai_id', 'unit_organisasi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_pegawai');
    }
};
