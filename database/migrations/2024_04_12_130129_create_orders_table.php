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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->string('customer_id', 100);
            $table->string('judul', 200)->nullable(false);
            $table->string('lokasi_jemput', 250)->nullable(false);
            $table->string('destinasi', 250)->nullable(false);
            $table->double('upah')->default(0);
            $table->string('photo')->default('');
            $table->longText('detail');
            $table->boolean('selesai')->default(false);
            $table->timestamps();

            $table->foreign('customer_id')->references('nim')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
