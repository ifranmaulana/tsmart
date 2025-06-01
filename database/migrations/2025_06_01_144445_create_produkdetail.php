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
        Schema::create('produkdetail', function (Blueprint $table) {
            $table->id('idprodukdetail'); // primary key auto-increment
            $table->unsignedBigInteger('idproduk');
            $table->string('namavariasi', 250);
            $table->string('harga', 250); // Disarankan pakai integer/decimal
            $table->string('stok', 255);  // Disarankan pakai integer
            $table->timestamps();

            // Foreign key opsional, aktifkan kalau tabel produk sudah ada
            // $table->foreign('idproduk')->references('idproduk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkdetail');
    }
};
