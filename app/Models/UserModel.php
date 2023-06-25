<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['NoHp','Nama Lengkap', 'Alamat', 'Username', 'Password'];
}


