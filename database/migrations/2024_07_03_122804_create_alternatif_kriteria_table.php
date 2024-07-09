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
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->constrained()->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->float('nilai'); // Nilai kriteria untuk alternatif ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
};
