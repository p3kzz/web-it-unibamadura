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
        Schema::create('katalog_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('pengguna_sasaran')->nullable();
            $table->string('service_owner')->nullable();
            $table->string('jam_layanan')->nullable();

            $table->text('sla')->nullable();
            $table->text('biaya')->nullable();
            $table->text('cara_akses')->nullable();

            $table->string('status')->default('Aktif');
            $table->string('dependencies')->nullable();
            $table->string('kontak')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_layanan');
    }
};
