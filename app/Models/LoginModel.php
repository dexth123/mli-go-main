<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'NoHp';
    protected $allowedFields = ['NoHp', 'Username', 'Password'];
}