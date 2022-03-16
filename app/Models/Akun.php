<?php

namespace App\Models;

use CodeIgniter\Model;

class Akun extends Model
{
    protected $table            = 'akun';
    protected $primaryKey       = 'id_akun';
    protected $useAutoIncrement = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_akun', 'nama_akun', 'jenis_akun'];
    protected $useTimestamps    = true;
}
