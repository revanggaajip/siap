<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriNonMedis extends Model
{
    protected $table            = 'kategori_non_medis';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];
    protected $useTimestamps = true;
}