<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanHeader extends Model
{
    protected $table            = 'penjualan_header';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'nama', 'tanggal', 'total', 'keterangan'];

    // Dates
    protected $useTimestamps = true;
}