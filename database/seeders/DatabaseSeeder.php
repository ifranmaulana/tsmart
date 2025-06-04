<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\komentar; // ✅ tambahkan baris ini
use Database\Seeders\artikel; // ✅ tambahkan baris ini
use Database\Seeders\produk; // ✅ tambahkan baris ini
use Database\Seeders\produkdetail; // ✅ tambahkan baris ini
use Database\Seeders\users; // ✅ tambahkan baris ini

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            komentar::class,
            artikel::class,
            produk::class,
            produkdetail::class,
            users::class,
        ]);
    }
}
