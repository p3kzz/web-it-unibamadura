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
        Schema::create('setting_footer', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['tautan cepat', 'sosial media']);
            $table->string('nama')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_active')->default(true);

            $table->index('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_footer');
    }
};
