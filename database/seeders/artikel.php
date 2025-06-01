<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class artikel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artikel')->insert([
            [
                'idartikel' => 5,
                'judul' => 'Mentan: Bulog Wajib Serap Gabah Apa Pun Kualitasnya!',
                'konten' => 'Menteri Pertanian (Mentan) Andi Amran Sulaiman meminta Perum Bulog wajib menyerap gabah dari petani dengan kualitas apa pun. Permintaan itu ditegaskan Amran saat menghadiri panen raya dan serap gabah di Desa Maluka Baulin, Kabupaten Tanah Laut, Kalimantan Selatan, Selasa (18/3/2025). “Saya kecewa dengan Bulog hari ini. Petani menunggu kepastian harga di sawah, tapi Bulog malah menunggu di gudang. Ini enggak bisa dibiarkan. Semua sektor harus bergerak cepat, enggak ada alasan. Bulog wajib serap gabah any quality, dan kalau ada yang tidak mau bekerja untuk rakyat, lebih baik minggir!” ujar Mentan dalam keterangannya.
Seorang petani mengutarakan bahwa Bulog di wilayah tersebut jarang turun ke lapangan dan sulit dihubungi. Padahal, mayoritas petani tengah memasuki musim panen. Dalam kesempatan itu, Mentan Amran juga mengingatkan seluruh pemangku kepentingan di sektor pertanian harus bekerja dalam satu kesatuan. Amran mengatakan, jika ada satu sektor yang bermasalah, semuanya akan ikut bermasalah.
“Kalau ada yang enggak mau kerja, suruh minggir. Ini enggak pakai tawar-menawar. Kalau di bawah saya ada yang enggak becus, saya hitung jam buat ganti orangnya. SK (surat keputusan) bisa saya tanda tangan dalam lima menit. Jadi jangan main-main kalau kerja untuk rakyat,” kata Amran. Diketahui, Presiden Prabowo Subianto memerintahkan Perum Bulog untuk menyerap tiga juta ton setara beras dari petani hingga April 2025. Pemerintah telah menyiapkan anggaran Rp 16,7 triliun untuk mencapai target tersebut. Anggaran diambil dari APBN.
Data terbaru yang diungkapkan Wakil Menteri Pertanian Sudaryono, menyebutkan bahwa Bulog telah menyerap sekitar 350.000 ton beras.
“Sekarang hariannya Bulog sudah 20.000 (ton) lebih ya. Kami mau tingkatkan sampai 50.000 kalau bisa,” kata Sudaryono saat ditemui di kantor Kemenko Pangan, Graha Mandiri, Jakarta Pusat, Senin (17/3/2025). Sementara data per Selasa (11/3/2025), serapan Bulog mencapai 255.000 ton beras.',
                'gambar' => '1746852841.jpeg',
                'tanggal' => '2025-05-10 11:54:01',
                'url' => 'https://money.kompas.com/read/2025/03/18/160800326/mentan-bulog-wajib-serap-gabah-apa-pun-kualitasnya?page=all&utm_source=Google&utm_medium=Newstand&utm_campaign=partner.',
                'sumber' => 'Kompas',
            ],
            [
                'idartikel' => 6,
                'judul' => 'TNI AD Akan Bangun 11.000 Titik Pengairan untuk 500.000 Hektare Sawah',
                'konten' => 'TNI Angkatan Darat akan membangun 11.000 titik pengairan yang bisa mengairi 500.000 hektare sawah. Hal ini disampaikan Kepala Staf TNI Angkatan Darat (KSAD) Jenderal Maruli Simanjuntak saat meresmikan sarana pengairan pertanian di Desa Ciwaru, Kecamatan Ciemas, Kabupaten Sukabumi, Jawa Barat, Senin (21/4/2025). "Kita (TNI AD) sudah sampaikan, kita punya rencana 11.000 titik yang bisa mengairi sampai 500.000 hektare sawah. Ini dalam proses, mudah-mudahan bisa terealisasi dan kita kerjakan serempak. Ide-ide ini juga kita menampung (berasal) dari masyarakat,” ujar KSAD dalam keterangan resmi, Selasa (22/4/2025). Maruli menjelaskan, peresmian sarana pengairan pertanian itu merupakan upaya TNI AD dalam mendukung ketahanan pangan nasional bekerja sama dengan Kementerian Pertanian dan Kementerian Pekerjaan Umum.
Maruli menjelaskan, peresmian sarana pengairan ini dilakukan serentak di 10 wilayah Indonesia (Banyumas, Brebes, Magetan, Nganjuk, Gresik, Pandeglang, Sukabumi, Simeulue, Aceh Tenggara, dan Gayo Lues), yang mencakup sekitar 4.536,42 hektare lahan sawah. Khusus untuk wilayah Sukabumi, sarana ini telah mengairi sawah seluas 2.377 hektare dengan metode pompa hidram, pipanisasi maupun irigasi pompa. Menurut dia, hal ini sesuai arahan Presiden Prabowo Subianto, di mana masalah pengairan menjadi prioritas utama di seluruh Indonesia.
"Pembangunan sarana pengairan ini bertujuan untuk meningkatkan produktivitas lahan pertanian serta mendukung sistem pertanian berkelanjutan," tulis keterangan Dinas Penerangan TNI AD. Sarana tersebut mencakup pembangunan irigasi, embung, dan jalur distribusi air yang akan dimanfaatkan oleh ribuan petani di wilayah tersebut. Pada kesempatan yang sama, Wakil Menteri Pertanian Sudaryono mengatakan, keterlibatan TNI itu merupakan salah satu bentuk fungsi teritorial TNI. Fungsi teritorial TNI yang dimaksud dalam program pertanian adalah sebagai pendampingan, memfasilitasi dan mendorong masyarakat dalam peningkatan kesejahteraan melalui pertanian.',
                'gambar' => '1746852824.jpg',
                'tanggal' => '2025-05-10 11:53:44',
                'url' => 'https://nasional.kompas.com/read/2025/04/22/11463891/tni-ad-akan-bangun-11000-titik-pengairan-untuk-500000-hektare-sawah.',
                'sumber' => 'Kompas',
            ],
            [
                'idartikel' => 7,
                'judul' => 'Pangkas Izin Sektor Pertanian untuk Tutup Celah Korupsi',
                'konten' => 'Presiden Prabowo Subianto menegaskan komitmennya untuk terus mendorong efisiensi anggaran. Hal tersebut salah satunya ditempuh melalui pemangkasan perizinan dan jalur distribusi seperti telah diterapkan dalam distribusi pupuk bersubsidi. Pemangkasan perizinan dan jalur distribusi itu sekaligus penting untuk mencegah korupsi.
Dalam acara panen raya nasional di 14 provinsi sentra produksi padi yang seremoninya digelar di Desa Randegan Wetan, Kecamatan Jatitujuh, Kabupaten Majalengka, Jawa Barat, Senin (7/4/2025), Menteri Pertanian Andi Amran Sulaiman melaporkan, semula jalur perizinan dan distribusi pupuk bersubsidi bagi para petani berbelit-belit.
Butuh gebrakan untuk memangkas birokrasi yang rumit itu. Situasinya berubah sejak dikeluarkannya Peraturan Presiden (Perpres) Nomor 6 Tahun 2025 tentang Tata Kelola Pupuk Bersubsidi.
”Sebelumnya adalah 12 menteri yang harus tanda tangan, ditandatangani 38 gubernur, kemudian 500 wali kota/bupati se-Indonesia, baru bisa tiba di petani. Sekarang berkat Inpres (Perpres No 6/2025) yang Bapak Presiden tanda tangani, dari Menteri Pertanian langsung ke pabrik, pabrik langsung ke Gapoktan petani. Ini betul-betul revolusi sektor pertanian,” kata Amran.
Sehubungan dengan laporan itu, Presiden menegaskan akan senantiasa mendorong efisiensi anggaran. Itu dilakukannya melalui pemotongan jalur distribusi yang panjang. Secara bersamaan, praktik korupsi juga berusaha ditekannya melalui mekanisme tersebut.
”Saya akan menghemat anggaran terus-menerus. Saya akan berusaha sekeras tenaga agar setiap anggaran, setiap uang rakyat, uang negara harus dirasakan manfaatnya oleh seluruh rakyat Indonesia, terutama rakyat yang paling membutuhkan,” kata Presiden.
Menurut Presiden, petani memiliki peranan penting bagi bangsa ini. Keberadaan mereka menjamin berlangsungnya ketahanan pangan. Untuk itu, ia menyebut, petani sebagai tulang punggung bangsa dan negara.
”Para petani adalah produsen pangan, tanpa pangan tidak ada negara, saya katakan berkali-kali, bertahun-tahun tanpa pangan tidak ada negara. Tanpa pangan tidak ada NKRI,” tandas Presiden.
Lebih dari itu, Presiden ingin menjalankan pembangunan pertanian berpihak kepada rakyat. Bahkan, ia ingin menurunkan harga pangan secara nasional. Cita-cita itu ingin diwujudkannya untuk membuat masyarakat bahagia. Lantas, segenap pejabat dimintanya ikut bekerja melayani rakyat sepenuh hati.
”Itu keinginan saya dan keinginan semua menteri, semua gubernur, semua bupati. Kita akan bahagia kalau rakyat ita senyum. Kita akan bahagia kalau para petani kita makmur,” kata Presiden.',
                'gambar' => '1746852807.webp',
                'tanggal' => '2025-05-10 11:53:27',
                'url' => 'https://www.kompas.id/artikel/pangkas-izin-sektor-pertanian-untuk-tutup-celah-korupsi',
                'sumber' => 'Kompas',
            ],
        ]);
    }
}
