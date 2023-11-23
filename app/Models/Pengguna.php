<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
    protected $table            = 'pengguna';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'tanggal_lahir', 'username', 'password', 'hak_akses'];
    protected $useTimestamps    = true;
}
