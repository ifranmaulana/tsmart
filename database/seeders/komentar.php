<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KomentarModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class komentar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KomentarModel::table('komentar')->insert([
            'idkomentar' => 3,
            'idartikel' => 7,
            'iduser' => 2,
            'isi' => 'bermanfaat',
            'tanggal' => now(),
            'balasan' => null,
        ]);
    }
}
