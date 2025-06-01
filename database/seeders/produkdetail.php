<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produkdetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produkdetail')->insert([
            ['idprodukdetail' => 20, 'idproduk' => 4, 'namavariasi' => '100 gr', 'harga' => 70000, 'stok' => 10],
            ['idprodukdetail' => 21, 'idproduk' => 3, 'namavariasi' => '100 ml', 'harga' => 31999, 'stok' => 10],
            ['idprodukdetail' => 22, 'idproduk' => 3, 'namavariasi' => '250 ml', 'harga' => 34900, 'stok' => 10],
            ['idprodukdetail' => 23, 'idproduk' => 2, 'namavariasi' => '250 ml', 'harga' => 55000, 'stok' => 10],
            ['idprodukdetail' => 24, 'idproduk' => 2, 'namavariasi' => '500 ml', 'harga' => 97000, 'stok' => 10],
            ['idprodukdetail' => 25, 'idproduk' => 5, 'namavariasi' => '200 ml', 'harga' => 32000, 'stok' => 10],
            ['idprodukdetail' => 26, 'idproduk' => 5, 'namavariasi' => '1 liter', 'harga' => 100000, 'stok' => 10],
        ]);
    }
}
