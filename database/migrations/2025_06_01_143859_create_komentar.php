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
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('idkomentar'); // primary key auto-increment
            $table->unsignedBigInteger('idartikel');
            $table->unsignedBigInteger('iduser');
            $table->text('isi');
            $table->dateTime('tanggal');
            $table->text('balasan')->nullable();
            $table->timestamps();

            // Foreign keys (uncomment jika tabel artikel & users sudah ada)
            // $table->foreign('idartikel')->references('idartikel')->on('artikel')->onDelete('cascade');
            // $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
