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
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periode')->cascadeOnDelete();
            $table->foreignId('pilar_id')->nullable()->constrained('pilar_transformasi')->nullOnDelete();
            $table->string('kode');
            $table->string('nama');
            $table->text('tujuan')->nullable();
            $table->text('sasaran')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('target_waktu')->nullable();
            $table->enum('status', ['planning', 'in_progress', 'completed', 'cancelled'])->default('planning');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['periode_id', 'kode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja');
    }
};
