<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat extends Model
{
    protected $table            = 'obat';
    protected $useAutoIncrement = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'kandungan', 'satuan', 'kapasitas', 'jenis', 'kategori', 'golongan', 'harga', 'stok', 'min_stok'];
    protected $useTimestamps = true;

    public function minStok()
    {
        return  $this->where('stok <= min_stok')->get()->getResultArray();
    }
}