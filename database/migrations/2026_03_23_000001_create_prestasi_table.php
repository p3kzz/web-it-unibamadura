<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('organization', 255);
            $table->text('description')->nullable();
            $table->date('achievement_date');
            $table->year('year');
            $table->string('image', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('year');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
