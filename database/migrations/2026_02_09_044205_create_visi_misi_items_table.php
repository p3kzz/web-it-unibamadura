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
        Schema::create('visi_misi_items', function (Blueprint $table) {
            $table->id();
            $table->enum('section', ['visi', 'misi', 'tujuan', 'sasaran']);
            $table->foreignId('periode_id')->nullable()->constrained('periode')->nullOnDelete();
            $table->string('title')->nullable();
            $table->text('content');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misi_items');
    }
};
