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
        Schema::create('pestisida', function (Blueprint $table) {
            $table->id('idpestisida'); // primary key auto-increment
            $table->string('nama', 250);
            $table->text('deskripsi');
            $table->text('gambar');
            $table->dateTime('tanggal');
            $table->text('sumber');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pestisida');
    }
};
