<?php

namespace App\Models;

use CodeIgniter\Model;

class Riwayat extends Model
{
    protected $table            = 'riwayat';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'tanggal', 'stok_awal', 'stok_perubahan', 'stok_akhir', 'status', 'id_header'];

    // Dates
    protected $useTimestamps = true;
   
}
