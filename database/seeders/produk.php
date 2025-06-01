<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'idproduk' => 2,
                'namaproduk' => 'Ketave',
                'deskripsi' => 'Ketave adalah insektisida racun kontak dan lambung yang digunakan untuk mengendalikan hama pada tanaman padi dan sayuran. Ketave berbentuk larutan dalam air berwarna kecoklatan. 
Bahan aktif 
Bahan aktif Ketave adalah Nitenpyram 100 g/l
Ketave bekerja secara sistemik translaminar
Cara kerja
Ketave efektif mengendalikan hama penusuk dan penghisap seperti wereng, kutu daun, kutu kebul, thrips, dan liriomyza 
Cara aplikasi: penyemprotan volume tinggi pada saat populasi atau intensitas serangan hama telah mencapai ambang pengendaliannya',
                'gambar' => '1746853026.jpg',
            ],
            [
                'idproduk' => 3,
                'namaproduk' => 'Abacel',
                'deskripsi' => 'Abacel adalah insektisida yang berbentuk pekatan berwarna coklat gelap. Abacel dapat digunakan untuk mengendalikan hama ulat grayak, thrips, wereng, kutu daun, dan kutu kebul. 
Kandungan 
Abacel mengandung bahan aktif abamektin 18 g/l
Abacel berbentuk racun kontak dan lambung
Cara penggunaan 
Dosis pemakaian Abacel 18 EC adalah 0,5 ml / liter air
Dosis dapat ditingkatkan menjadi 1 - 3 ml / liter air jika serangan hama meningkat
Tuangkan Abacel ke dalam ember yang berisi air dan aduk dengan merata sebelum digunakan',
                'gambar' => '1746852980.jpg',
            ],
            [
                'idproduk' => 4,
                'namaproduk' => 'Plenum',
                'deskripsi' => 'Syngenta PLENUM 50 WG adalah insektisida sistemik yang bersifat menghambat aktivitas makan serangga, berbentuk butiran berwarna kecoklatan yang dapat disuspensikan dalam air untuk mengendalikan hama wereng coklat, wereng punggung putih, wereng hijau, kepinding tanah dan walang sangit pada tanaman padi.',
                'gambar' => '1746852955.jpeg',
            ],
            [
                'idproduk' => 5,
                'namaproduk' => 'Roundup',
                'deskripsi' => 'Roundup adalah herbisida sistemik, atau obat pembasmi rumput, yang efektif untuk mengendalikan berbagai jenis gulma dan rumput liar. Roundup terkenal karena kemampuan untuk menembus hingga akar gulma, sehingga efektif dalam membasmi rumput secara tuntas.',
                'gambar' => '1747065841.jpg',
            ],
        ]);
    }
}
