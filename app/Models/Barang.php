<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_barang', 'nama_barang', 'stok_barang', 'satuan_barang'];
}
