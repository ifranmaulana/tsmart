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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('idkeranjang'); // primary key auto-increment
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idproduk');
            $table->string('jumlah', 250);
            $table->timestamps();

            // Foreign keys opsional, uncomment kalau tabel `users` dan `produk` sudah ada
            // $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idproduk')->references('idproduk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
