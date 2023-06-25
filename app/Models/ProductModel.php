<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'Produk'; // Nama tabel dalam database

    protected $primaryKey = 'idproduk'; // Nama primary key

    protected $allowedFields = ['nama', 'harga', 'jumlah']; // Kolom yang diizinkan untuk diisi

    // Metode lain yang mungkin Anda perlukan untuk memanipulasi data produk
}
