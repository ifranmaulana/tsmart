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
        Schema::create('hama', function (Blueprint $table) {
            $table->id('idhama'); // primary key auto-increment
            $table->text('deskripsi');
            $table->dateTime('tanggal');
            $table->string('sumber', 250);
            $table->timestamps(); // created_at & updated_at, bisa dihapus kalau nggak perlu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hama');
    }
};
