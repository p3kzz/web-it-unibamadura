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
        Schema::create('restra_dti', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->year('year');
            $table->text('deskripsi')->nullable();
            $table->string('file', 255);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restra_dti');
    }
};
