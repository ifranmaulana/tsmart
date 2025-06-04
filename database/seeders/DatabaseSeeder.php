<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\Komentar; // ✅ tambahkan baris ini

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
