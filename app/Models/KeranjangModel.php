<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    use HasFactory;

    protected $table = 'keranjang'; // Nama tabel di database

    protected $primaryKey = 'idkeranjang'; // Primary key-nya bukan "id"

    public $timestamps = false; // Kalau tidak ada kolom created_at & updated_at

    protected $fillable = [
        'iduser',
        'idproduk',
        'jumlah',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'idproduk');
    }
}
