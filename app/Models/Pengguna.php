<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pengguna', 'tanggal_lahir_pengguna', 'username_pengguna', 'password_pengguna', 'hak_akses_pengguna'];
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
}
