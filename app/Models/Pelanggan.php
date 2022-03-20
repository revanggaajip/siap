<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_pelanggan', 'nama_pelanggan', 'no_hp_pelanggan', 'alamat_pelanggan'];
}
