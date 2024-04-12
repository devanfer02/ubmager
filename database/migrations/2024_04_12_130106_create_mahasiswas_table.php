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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim', 100)->primary();
            $table->string('nama_lengkap', 250)->nullable(false);
            $table->string('nomor_wa', 150)->default('');
            $table->string('fakultas', 150)->nullable(false);
            $table->string('program_studi', 200)->nullable(false);
            $table->string('foto_profil', 250)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
