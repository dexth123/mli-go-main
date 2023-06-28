<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produk'; 
    protected $primaryKey = 'idproduk'; 
    protected $returnType = 'object';
    protected $allowedFields = ['idproduk','nama', 'harga', 'jumlah']; 
    protected $validationRules = [
        'nama' => 'required',
        'harga' => 'required',
        'jumlah' => 'required'
        ];
       
}
